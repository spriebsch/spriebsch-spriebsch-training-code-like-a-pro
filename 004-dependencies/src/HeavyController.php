<?php declare(strict_types=1);

namespace spriebsch\oop\dependencies;

use PDO;

class HeavyController extends AbstractBaseController implements ControllerInterface
{
    private SomeService $service;
    private ?PDO $pdo;
    public const COMPILE_TIME_CONSTANT = 'compiled';
    private int $now;
    private string $applicationState;

    public function __construct(string $applicationState, int $now, SomeService $service, ?PDO $pdo = null)
    {
        $this->applicationState = $applicationState;
        $this->now = $now;
        $this->service = $service;
        $this->pdo = $pdo;

        parent::__construct();
    }

    /**
     * @return array<string, mixed>
     */
    public function handle(): array
    {
        // @todo pass explicitly
        $envPath = $this->readEnv('PATH');
        $envAppEnv = $this->readEnv('APP_ENV', 'prod');

        // @todo read elsewhere
        $memoryLimit = ini_get('memory_limit');
        $displayErrors = ini_get('display_errors');

        // @todo pass explicitly
        $phpVersion = PHP_VERSION;
        $os = PHP_OS_FAMILY;

        // @todo encapsulate
        $uname = function_exists('php_uname') ? php_uname('s') : null;

        // @todo we cannot manage them in userland
        $extensions = [
            'json' => extension_loaded('json'),
            'pdo'  => extension_loaded('pdo'),
            'curl' => extension_loaded('curl'),
        ];

        // @todo move to a loader
        $file = __DIR__ . '/../data/file.txt';
        $snippet = $this->readFileIfExists($file);
        $snippet = is_string($snippet) ? substr($snippet, 0, 40) : null;

        // @todo encapsulate
        $dbInfo = null;
        if ($this->pdo instanceof PDO) {
            try {
                $dbInfo = [
                    'driver'         => $this->pdo->getAttribute(PDO::ATTR_DRIVER_NAME),
                    'server_version' => $this->pdo->getAttribute(PDO::ATTR_SERVER_VERSION),
                ];
            } catch (\Throwable) {
                $dbInfo = ['connected' => false];
            }
        }

        $dataStructure = [
            'stack' => [1, 2, 3],
            'map'   => ['a' => 1, 'b' => 2],
        ];

        // @todo encapsulate
        $externalService = null;
        $url = 'https://3v4l.org/';
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $ctx = stream_context_create(['http' => ['timeout' => 1]]);
            $externalService = @file_get_contents($url, false, $ctx) !== false ? 'ok' : 'unreachable';
        }

        // @todo encapsulate
        $thirdParty = [
            'command_available' => trim((string) shell_exec('/usr/bin/ls')) !== ''
        ];

        // @todo inject time
        // $now = time();
        $constantProbe = defined('PHP_SAPI') ? PHP_SAPI : null;

        // @todo use dependency injection
        $staticServiceInfo = [
            'framework' => StaticService::frameworkName(),
            'version'   => StaticService::VERSION,
        ];

        // @todo this one is okay
        $serviceInfo = [
            'service' => $this->service->name(),
            'sum'     => $this->service->compute(2, 3),
        ];

        // @todo superglobal is also global
        // @todo encapsulate, make explicit -> request object
        $http = [
            'method' => $_SERVER['REQUEST_METHOD'] ?? null,
            'uri'    => $_SERVER['REQUEST_URI'] ?? null,
        ];

        return [
            'compile_time'     => self::COMPILE_TIME_CONSTANT,
            'global_state'     => [
                'app_state' => $this->applicationState,
            ],
            'superglobals'     => [
                'SERVER' => $_SERVER,
                'GET'    => $_GET
            ],
            'environment'      => ['PATH' => $envPath, 'APP_ENV' => $envAppEnv],
            'runtime'          => ['memory_limit' => $memoryLimit, 'display_errors' => $displayErrors],
            'php'              => ['version' => $phpVersion, 'sapi' => $constantProbe],
            'extensions'       => $extensions,
            'file'             => ['path' => $file, 'snippet' => $snippet],
            'database'         => $dbInfo,
            'data_structure'   => $dataStructure,
            'external_service' => $externalService,
            'third_party'      => $thirdParty,
            'time'             => $this->now,
            'static'           => $staticServiceInfo,
            'service'          => $serviceInfo,
            'http'             => $http,
            'os'               => ['family' => $os, 'uname' => $uname],
            'base_class'       => static::class,
            'interface'        => ControllerInterface::class,
        ];
    }
}
