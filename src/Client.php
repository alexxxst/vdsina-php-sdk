<?php
/** @noinspection GrazieStyle */
/** @noinspection SpellCheckingInspection */
/** @noinspection DuplicatedCode */

declare(strict_types=1);

namespace Vdsina;

use JsonException;

/**
 * VDSina public API client (https://userapi.vdsina.com).
 *
 * A compact, dependency-free SDK (cURL + JSON) that covers the whole public
 * API surface. The target host and API version are configurable through the
 * constructor, nothing is hard-coded.
 *
 * Conventions
 * -----------
 * - Every request is authenticated with the bearer token passed to the
 *   constructor (Authorization: Bearer <token>).
 * - Every method returns the `data` member of the API response envelope
 *   (a decoded associative array, or null when the endpoint has no payload).
 *   The envelope itself (`status`, `status_msg`, `data`) is available via
 *   {@see getLastResponse()} after any call.
 * - API errors (envelope `status` === "error") and non-2xx HTTP statuses are
 *   translated into {@see ApiException}.
 * - Field names sent to / received from the API are exactly the ones defined
 *   in the OpenAPI schema (including hyphenated names such as `server-plan`,
 *   `ssh-key`, `ip-reserve`). PHP camelCase arguments are mapped internally.
 *
 * Usage
 * -----
 *   $api = new Vdsina\Client('your-api-token');
 *   $account = $api->getAccount();
 */
class Client
{
    /**
     * API bearer token.
     */
    private string $token;

    /**
     * Base URL, e.g. "https://userapi.vdsina.com/v1".
     */
    private string $baseUrl;

    /**
     * Request timeout in seconds (connect + total).
     */
    private int $timeout;

    /**
     * User-Agent header value.
     */
    private string $userAgent;

    /**
     * Extra cURL options merged over the SDK defaults (user options win).
     *
     * @var array<int, mixed>
     */
    private array $curlOptions;

    /**
     * Decoded envelope of the most recent response (null before any call).
     *
     * @var array<string, mixed>|null
     */
    private ?array $lastResponse = null;

    /**
     * HTTP status code of the most recent response (null before any call).
     */
    private ?int $lastHttpCode = null;

    /**
     * @param string $token       Permanent API token (obtained in the control panel).
     * @param string $host        Target host, e.g. "userapi.vdsina.com" or
     *                            "userapi.vdsina.com". May include a scheme; if it
     *                            does not, `$scheme` is prepended. A trailing "/" is
     *                            stripped automatically.
     * @param string $version     API version prefix, default "v1".
     * @param string $scheme      URL scheme used when `$host` has none ("https"/"http").
     * @param int    $timeout     Request timeout in seconds.
     * @param string $userAgent   User-Agent header.
     * @param array<int, mixed> $curlOptions Additional cURL options (e.g. proxy, SSL
     *                            flags); merged over the SDK defaults.
     */
    public function __construct(
        string $token,
        string $host = 'userapi.vdsina.com',
        string $version = 'v1',
        string $scheme = 'https',
        int $timeout = 30,
        string $userAgent = 'vdsina-php-sdk/1.0.0',
        array $curlOptions = []
    ) {
        $this->token = $token;
        $this->baseUrl = $this->buildBaseUrl($host, $version, $scheme);
        $this->timeout = $timeout;
        $this->userAgent = $userAgent;
        $this->curlOptions = $curlOptions;
    }

    /**
     * Returns the decoded envelope of the most recent API response.
     *
     * @return array<string, mixed>|null
     */
    final public function getLastResponse(): ?array
    {
        return $this->lastResponse;
    }

    /**
     * Returns the HTTP status code of the most recent API response.
     */
    final public function getLastHttpCode(): ?int
    {
        return $this->lastHttpCode;
    }

    /**
     * Updates the bearer token used for subsequent requests.
     */
    final public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    // ---------------------------------------------------------------------
    // Account
    // ---------------------------------------------------------------------

    /**
     * Account information and shutdown forecast (GET /account).
     *
     * @return array{
     *     account: array{id: int, name: string},
     *     created: string,
     *     forecast: string|null,
     *     can: array{add_user: bool, add_service: bool, convert_to_cash: bool}
     * }|null
     *
     * @throws ApiException
     */
    final public function getAccount(): ?array
    {
        return $this->request('GET', '/account');
    }

    /**
     * Account balances (GET /account.balance).
     *
     * @return array{real: string, bonus: string, partner: string}|null
     *
     * @throws ApiException
     */
    final public function getBalance(): ?array
    {
        return $this->request('GET', '/account.balance');
    }

    /**
     * Account service limits (GET /account.limit).
     *
     * @return array{
     *     server: array{max: int, now: int}|null,
     *     'server-ip4': array{max: int, child_max: int, now: int}|null,
     *     'server-ip6': array{max: int, child_max: int, now: int}|null,
     *     iso: array{max: int, now: int}|null,
     *     backup: array{max: int, now: int}|null,
     *     ssl: array{max: int, now: int}|null,
     *     domain: array{max: int, now: int}|null,
     *     dns: array{max: int, now: int}|null,
     *     'extdisk-hdd': array{max: int, now: int}|null,
     *     'extdisk-nvme': array{max: int, now: int}|null,
     *     'reserve-ip': array{max: int, now: int}|null
     * }|null
     *
     * @throws ApiException
     */
    final public function getLimits(): ?array
    {
        return $this->request('GET', '/account.limit');
    }

    /**
     * Registers a new account using an affiliate code (POST /register).
     *
     * @param string $email New client login (e-mail).
     * @param string $code  Your partner/affiliate code.
     *
     * @return array{
     *     account: array{id: int},
     *     user: array{id: int, name: string, token: string|null}
     * }|null
     *
     * @throws ApiException
     */
    final public function register(string $email, string $code): ?array
    {
        return $this->request('POST', '/register', [], [
            'email' => $email,
            'code' => $code,
        ]);
    }

    // ---------------------------------------------------------------------
    // Helpers
    // ---------------------------------------------------------------------

    /**
     * List of tariff plan groups (GET /server-group).
     *
     * @return array<int, array{id: int, name: string, active: bool, description: string}>|null
     *
     * @throws ApiException
     */
    final public function getServerGroups(): ?array
    {
        return $this->request('GET', '/server-group');
    }

    /**
     * List of datacenters (GET /datacenter).
     *
     * @return array<int, array{id: int, name: string, country: string, active: bool}>|null
     *
     * @throws ApiException
     */
    final public function getDatacenters(): ?array
    {
        return $this->request('GET', '/datacenter');
    }

    /**
     * List of OS templates (GET /template).
     *
     * @return array<int, array{
     *     id: int,
     *     name: string,
     *     active: bool,
     *     'ssh-key': bool,
     *     'server-plan': int[],
     *     limits: array{
     *         cpu: array{min: int},
     *         ram: array{min: int},
     *         disk: array{min: int}
     *     }
     * }>|null
     *
     * @throws ApiException
     */
    final public function getTemplates(): ?array
    {
        return $this->request('GET', '/template');
    }

    /**
     * List of tariff plans for a tariff plan group (GET /server-plan/{groupID}).
     *
     * @param int $groupId Tariff plan group ID.
     *
     * @return array<int, array{
     *     id: int,
     *     name: string,
     *     cost: float,
     *     full_cost: float,
     *     period: string,
     *     min_money: float,
     *     can_bonus: bool,
     *     description: string,
     *     'server-group': int,
     *     active: bool,
     *     enable: bool,
     *     data: array{
     *         cpu: array{value: int, for: string},
     *         ram: array{value: float, bytes: int, for: string},
     *         disk: array{value: int, bytes: int, for: string},
     *         gpu: array{value: int, for: string}|null,
     *         traff: array{value: int, bytes: int, for: string}
     *     },
     *     backup: array{cost: float, full_cost: float, period: string, for: string},
     *     has_params: bool,
     *     params: array{
     *         cpu: array{min: int, max: int, step: int, for: string, cost: float, full_cost: float, period: string, st_bonus: bool},
     *         ram: array{min: int, max: int, step: int, ram_for_cpu: int, for: string, cost: float, full_cost: float, period: string, st_bonus: bool},
     *         disk: array{min: int, max: int, step: int, for: string, cost: float, full_cost: float, period: string, st_bonus: bool},
     *         ip4: array{cost: float, full_cost: float, period: string, st_bonus: bool}
     *     }|null
     * }>|null
     *
     * @throws ApiException
     */
    final public function getServerPlans(int $groupId): ?array
    {
        return $this->request('GET', '/server-plan/' . $groupId);
    }

    // ---------------------------------------------------------------------
    // SSH keys
    // ---------------------------------------------------------------------

    /**
     * List of SSH keys (GET /ssh-key).
     *
     * @return array<int, array{id: int, name: string}>|null
     *
     * @throws ApiException
     */
    final public function getSshKeys(): ?array
    {
        return $this->request('GET', '/ssh-key');
    }

    /**
     * Creates a new SSH key (POST /ssh-key).
     *
     * @param string $name Key name.
     * @param string $data Key string representation (e.g. "ssh-rsa AAAA...").
     *
     * @return array{id: int}|null
     *
     * @throws ApiException
     */
    final public function createSshKey(string $name, string $data): ?array
    {
        return $this->request('POST', '/ssh-key', [], [
            'name' => $name,
            'data' => $data,
        ]);
    }

    /**
     * Views a single SSH key (GET /ssh-key/{keyID}).
     *
     * @param int $keyId SSH key ID.
     *
     * @return array{id: int, name: string, status: string, data: string}|null
     *
     * @throws ApiException
     */
    final public function getSshKey(int $keyId): ?array
    {
        return $this->request('GET', '/ssh-key/' . $keyId);
    }

    /**
     * Updates an SSH key (PUT /ssh-key/{keyID}).
     *
     * @param int    $keyId SSH key ID.
     * @param string $name  New key name.
     * @param string $data  New key string representation.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function updateSshKey(int $keyId, string $name, string $data): ?array
    {
        return $this->request('PUT', '/ssh-key/' . $keyId, [], [
            'name' => $name,
            'data' => $data,
        ]);
    }

    /**
     * Deletes an SSH key (DELETE /ssh-key/{keyID}).
     *
     * @param int $keyId SSH key ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteSshKey(int $keyId): ?array
    {
        return $this->request('DELETE', '/ssh-key/' . $keyId);
    }

    // ---------------------------------------------------------------------
    // ISO
    // ---------------------------------------------------------------------

    /**
     * List of ISO services (GET /iso).
     *
     * @return array<int, array{
     *     id: int,
     *     name: string,
     *     full_name: string,
     *     created: string,
     *     updated: string,
     *     end: string,
     *     status: string,
     *     status_text: string,
     *     file: array{size: string, md5: string},
     *     attached: bool,
     *     server: array{id: int, name: string}|null,
     *     can: array{delete: bool}
     * }>|null
     *
     * @throws ApiException
     */
    final public function getIsos(): ?array
    {
        return $this->request('GET', '/iso');
    }

    /**
     * Queues a download of an ISO file (POST /iso).
     *
     * @param string $url Direct URL to the ISO file (http/https/ftp/ftps,
     *                    application/x-iso9660-image MIME, max 10 Gb).
     *
     * @return array{id: string}|null The download job KEY (32 hex chars).
     *
     * @throws ApiException
     */
    final public function downloadIso(string $url): ?array
    {
        return $this->request('POST', '/iso', [], ['url' => $url]);
    }

    /**
     * Checks the ISO download job status (GET /iso/{KEY}).
     *
     * @param string $key ISO download job KEY (32 hex chars).
     *
     * @return array{status: string, description: string|null}|null
     *         `status` is one of "processing", "done", "error".
     *
     * @throws ApiException
     */
    final public function getIsoDownloadStatus(string $key): ?array
    {
        return $this->request('GET', '/iso/' . $key);
    }

    /**
     * Creates an ISO service from a downloaded file (POST /iso/{KEY}).
     *
     * @param string $key ISO download job KEY (32 hex chars, status must be "done").
     *
     * @return array{id: int}|null The new ISO service ID.
     *
     * @throws ApiException
     */
    final public function createIso(string $key): ?array
    {
        return $this->request('POST', '/iso/' . $key);
    }

    /**
     * Views an ISO service (GET /iso/{isoID}).
     *
     * @param int $isoId ISO service ID.
     *
     * @return array<string, mixed>|null
     *
     * @throws ApiException
     */
    final public function getIso(int $isoId): ?array
    {
        return $this->request('GET', '/iso/' . $isoId);
    }

    /**
     * Deletes an ISO service (DELETE /iso/{isoID}).
     *
     * @param int $isoId ISO service ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteIso(int $isoId): ?array
    {
        return $this->request('DELETE', '/iso/' . $isoId);
    }

    // ---------------------------------------------------------------------
    // Server
    // ---------------------------------------------------------------------

    /**
     * List of servers (GET /server).
     *
     * @return array<int, array{
     *     id: int,
     *     name: string,
     *     full_name: string,
     *     created: string,
     *     updated: string,
     *     end: string,
     *     status: string,
     *     status_text: string,
     *     ip: array{id: int, ip: string, type: string}|null,
     *     'server-plan': array{id: int, name: string},
     *     template: array{id: int, name: string},
     *     datacenter: array{id: int, name: string, country: string},
     *     can: array{reboot: bool, update: bool, delete: bool, prolong: bool}
     * }>|null
     *
     * @throws ApiException
     */
    final public function getServers(): ?array
    {
        return $this->request('GET', '/server');
    }

    /**
     * Creates a new server (POST /server).
     *
     * @param int         $datacenter Datacenter ID (required).
     * @param int         $serverPlan Tariff plan ID (required).
     * @param string|null $name       Server name.
     * @param int|null    $template   OS template ID (mutually exclusive with `backup` and `iso`).
     * @param int|null    $backup     Backup service ID to restore from (mutually exclusive
     *                                with `template`; same datacenter required).
     * @param string|null $schedule   "0" or "1", create an automatic weekly backup schedule.
     * @param int|null    $sshKey     SSH key ID for the root user.
     * @param int|null    $iso        ISO service ID (mutually exclusive with `template`).
     * @param string|null $host       Server hostname (valid domain name).
     * @param int|null    $cpu        Number of virtual CPUs (constructor tariffs).
     * @param int|null    $ram        Amount of RAM in GB (constructor tariffs).
     * @param int|null    $disk       Storage amount in GB (constructor tariffs).
     * @param int|null    $gpu        Number of GPUs (constructor tariffs).
     * @param string|null $ip4        "0" or "1", order IPv4 for the server.
     * @param int|null    $ipReserve  Reserved IP service ID.
     *
     * @return array{id: int}|null The new server ID.
     *
     * @throws ApiException
     */
    final public function createServer(
        int $datacenter,
        int $serverPlan,
        ?string $name = null,
        ?int $template = null,
        ?int $backup = null,
        ?string $schedule = null,
        ?int $sshKey = null,
        ?int $iso = null,
        ?string $host = null,
        ?int $cpu = null,
        ?int $ram = null,
        ?int $disk = null,
        ?int $gpu = null,
        ?string $ip4 = null,
        ?int $ipReserve = null
    ): ?array {
        $body = [
            'datacenter' => $datacenter,
            'server-plan' => $serverPlan,
        ];
        if ($name !== null) {
            $body['name'] = $name;
        }
        if ($template !== null) {
            $body['template'] = $template;
        }
        if ($backup !== null) {
            $body['backup'] = $backup;
        }
        if ($schedule !== null) {
            $body['schedule'] = $schedule;
        }
        if ($sshKey !== null) {
            $body['ssh-key'] = $sshKey;
        }
        if ($iso !== null) {
            $body['iso'] = $iso;
        }
        if ($host !== null) {
            $body['host'] = $host;
        }
        if ($cpu !== null) {
            $body['cpu'] = $cpu;
        }
        if ($ram !== null) {
            $body['ram'] = $ram;
        }
        if ($disk !== null) {
            $body['disk'] = $disk;
        }
        if ($gpu !== null) {
            $body['gpu'] = $gpu;
        }
        if ($ip4 !== null) {
            $body['ip4'] = $ip4;
        }
        if ($ipReserve !== null) {
            $body['ip-reserve'] = $ipReserve;
        }

        return $this->request('POST', '/server', [], $body);
    }

    /**
     * Views server info (GET /server/{serverID}).
     *
     * @param int $serverId Server ID.
     *
     * @return array<string, mixed>|null
     *
     * @throws ApiException
     */
    final public function getServer(int $serverId): ?array
    {
        return $this->request('GET', '/server/' . $serverId);
    }

    /**
     * Updates server parameters (PUT /server/{serverID}).
     *
     * @param int         $serverId     Server ID.
     * @param string      $name         New server name (required).
     * @param string|null $autoprolong  "0" or "1", automatic prolongation option.
     * @param string|null $reserveIp    "0" or "1", automatic IP reserve creation option.
     * @param string|null $autorun      "0" or "1", automatic server start option.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function updateServer(
        int $serverId,
        string $name,
        ?string $autoprolong = null,
        ?string $reserveIp = null,
        ?string $autorun = null
    ): ?array {
        $body = ['name' => $name];
        if ($autoprolong !== null) {
            $body['autoprolong'] = $autoprolong;
        }
        if ($reserveIp !== null) {
            $body['reserve_ip'] = $reserveIp;
        }
        if ($autorun !== null) {
            $body['autorun'] = $autorun;
        }

        return $this->request('PUT', '/server/' . $serverId, [], $body);
    }

    /**
     * Deletes a server (DELETE /server/{serverID}).
     *
     * @param int $serverId Server ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteServer(int $serverId): ?array
    {
        return $this->request('DELETE', '/server/' . $serverId);
    }

    /**
     * Reboots a server (PUT /server.reboot/{serverID}).
     *
     * @param int         $serverId Server ID.
     * @param string|null $type     Reboot type: "soft" (default) or "hard".
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function rebootServer(int $serverId, ?string $type = null): ?array
    {
        $body = $type === null ? null : ['type' => $type];

        return $this->request('PUT', '/server.reboot/' . $serverId, [], $body);
    }

    /**
     * Reinstalls the server (PUT /server.reinstall/{serverID}).
     *
     * @param int         $serverId Server ID.
     * @param int|null    $template OS template ID to install.
     * @param int|null    $sshKey   SSH key ID for the root user.
     * @param string|null $host     Server hostname (valid domain name).
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function reinstallServer(int $serverId, ?int $template = null, ?int $sshKey = null, ?string $host = null): ?array
    {
        $body = [];
        if ($template !== null) {
            $body['template'] = $template;
        }
        if ($sshKey !== null) {
            $body['ssh-key'] = $sshKey;
        }
        if ($host !== null) {
            $body['host'] = $host;
        }

        return $this->request('PUT', '/server.reinstall/' . $serverId, [], $body);
    }

    /**
     * Gets the default server password (GET /server.password/{serverID}).
     *
     * @param int $serverId Server ID.
     *
     * @return array{user: string, password: string}|null
     *
     * @throws ApiException
     */
    final public function getServerPassword(int $serverId): ?array
    {
        return $this->request('GET', '/server.password/' . $serverId);
    }

    /**
     * Sets the server password (PUT /server.password/{serverID}).
     *
     * The server is restarted and the root password is set on supported Linux
     * distributions.
     *
     * @param int    $serverId Server ID.
     * @param string $password New superuser password (required).
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function setServerPassword(int $serverId, string $password): ?array
    {
        return $this->request('PUT', '/server.password/' . $serverId, [], ['password' => $password]);
    }

    /**
     * Changes the server tariff plan (PUT /server.plan/{serverID}).
     *
     * @param int      $serverId   Server ID.
     * @param int      $serverPlan New tariff plan ID from the same tariff group (required).
     * @param int|null $cpu        New CPU count (constructor tariff).
     * @param int|null $ram        New RAM amount in GB (constructor tariff).
     * @param int|null $disk       New storage in GB, not smaller than current (constructor tariff).
     * @param int|null $gpu        New GPU count (constructor tariff).
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function changeServerPlan(
        int $serverId,
        int $serverPlan,
        ?int $cpu = null,
        ?int $ram = null,
        ?int $disk = null,
        ?int $gpu = null
    ): ?array {
        $body = ['server-plan' => $serverPlan];
        if ($cpu !== null) {
            $body['cpu'] = $cpu;
        }
        if ($ram !== null) {
            $body['ram'] = $ram;
        }
        if ($disk !== null) {
            $body['disk'] = $disk;
        }
        if ($gpu !== null) {
            $body['gpu'] = $gpu;
        }

        return $this->request('PUT', '/server.plan/' . $serverId, [], $body);
    }

    /**
     * Prolongs and starts a server (PUT /server.prolong/{serverID}).
     *
     * @param int $serverId Server ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function prolongServer(int $serverId): ?array
    {
        return $this->request('PUT', '/server.prolong/' . $serverId);
    }

    /**
     * Attaches an ISO to a server (PUT /server.iso/{serverID}).
     *
     * The server will be restarted.
     *
     * @param int $serverId Server ID.
     * @param int $iso      ISO service ID (required).
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function attachServerIso(int $serverId, int $iso): ?array
    {
        return $this->request('PUT', '/server.iso/' . $serverId, [], ['iso' => $iso]);
    }

    /**
     * Detaches an ISO from a server (DELETE /server.iso/{serverID}).
     *
     * The server will be restarted.
     *
     * @param int $serverId Server ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function detachServerIso(int $serverId): ?array
    {
        return $this->request('DELETE', '/server.iso/' . $serverId);
    }

    /**
     * Server statistics (GET /server.stat/{serverID}).
     *
     * @param int         $serverId Server ID.
     * @param string|null $from     Filter date from (e.g. "2024-07-01").
     * @param string|null $to       Filter date to.
     *
     * @return array<int, array{
     *     dt: string,
     *     stat: array{
     *         cpu: float,
     *         disk_reads: int,
     *         disk_writes: int,
     *         lnet_rx: int,
     *         lnet_tx: int,
     *         vnet_rx: int,
     *         vnet_tx: int
     *     }
     * }>|null
     *
     * @throws ApiException
     */
    final public function getServerStats(int $serverId, ?string $from = null, ?string $to = null): ?array
    {
        $query = [];
        if ($from !== null) {
            $query['from'] = $from;
        }
        if ($to !== null) {
            $query['to'] = $to;
        }

        return $this->request('GET', '/server.stat/' . $serverId, $query);
    }

    // ---------------------------------------------------------------------
    // Backup
    // ---------------------------------------------------------------------

    /**
     * List of backups (GET /backup).
     *
     * @return array<int, array<string, mixed>>|null
     *
     * @throws ApiException
     */
    final public function getBackups(): ?array
    {
        return $this->request('GET', '/backup');
    }

    /**
     * Views backup information (GET /backup/{backupID}).
     *
     * @param int $backupId Backup ID.
     *
     * @return array<string, mixed>|null
     *
     * @throws ApiException
     */
    final public function getBackup(int $backupId): ?array
    {
        return $this->request('GET', '/backup/' . $backupId);
    }

    /**
     * Updates backup information (PUT /backup/{backupID}).
     *
     * @param int         $backupId     Backup ID.
     * @param string      $name         New backup name (required).
     * @param string|null $autoprolong  "0" or "1", automatic prolongation option.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function updateBackup(int $backupId, string $name, ?string $autoprolong = null): ?array
    {
        $body = ['name' => $name];
        if ($autoprolong !== null) {
            $body['autoprolong'] = $autoprolong;
        }

        return $this->request('PUT', '/backup/' . $backupId, [], $body);
    }

    /**
     * Deletes a backup (DELETE /backup/{backupID}).
     *
     * @param int $backupId Backup ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteBackup(int $backupId): ?array
    {
        return $this->request('DELETE', '/backup/' . $backupId);
    }

    /**
     * Creates a new backup of a service (POST /backup/{serviceID}).
     *
     * @param int $serviceId Service ID (server or external disk).
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function createBackup(int $serviceId): ?array
    {
        return $this->request('POST', '/backup/' . $serviceId);
    }

    /**
     * Restores a backup to a service (PUT /backup.restore/{backupID}).
     *
     * @param int $backupId Backup ID.
     * @param int $service  Service ID to restore to (server or external disk, required).
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function restoreBackup(int $backupId, int $service): ?array
    {
        return $this->request('PUT', '/backup.restore/' . $backupId, [], ['service' => $service]);
    }

    /**
     * Copies a backup to another datacenter (POST /backup.copy/{backupID}).
     *
     * @param int $backupId   Backup ID.
     * @param int $datacenter Datacenter ID to copy to (required).
     *
     * @return array{id: int}|null The new backup ID.
     *
     * @throws ApiException
     */
    final public function copyBackup(int $backupId, int $datacenter): ?array
    {
        return $this->request('POST', '/backup.copy/' . $backupId, [], ['datacenter' => $datacenter]);
    }

    // ---------------------------------------------------------------------
    // Backup schedules
    // ---------------------------------------------------------------------

    /**
     * Backup schedule list (GET /backup.schedule/{serviceID}).
     *
     * @param int $serviceId Service ID (server or external disk).
     *
     * @return array{
     *     day: array{type: string, left: int, hour: int}|null,
     *     week: array{type: string, left: int, day: int, hour: int}|null,
     *     month: array{type: string, left: int, day: int, hour: int}|null
     * }|null
     *
     * @throws ApiException
     */
    final public function getBackupSchedule(int $serviceId): ?array
    {
        return $this->request('GET', '/backup.schedule/' . $serviceId);
    }

    /**
     * Creates a backup schedule (POST /backup.schedule/{serviceID}).
     *
     * @param int   $serviceId Service ID (server or external disk).
     * @param array $schedule  Schedule definition, exactly one of:
     *                         - array{type: 'day',   left: int, hour: int}
     *                         - array{type: 'week',  left: int, day: int, hour: int}
     *                         - array{type: 'month', left: int, day: int, hour: int}
     *                         (`left` 1-7, `day` week 1-7 / month 1-31, `hour` 0-10).
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function createBackupSchedule(int $serviceId, array $schedule): ?array
    {
        return $this->request('POST', '/backup.schedule/' . $serviceId, [], $schedule);
    }

    /**
     * Deletes a backup schedule (DELETE /backup.schedule/{serviceID}).
     *
     * @param int         $serviceId Service ID (server or external disk).
     * @param string|null $type      Schedule type to delete ("day", "week" or "month").
     *                               When omitted, all schedules are deleted.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteBackupSchedule(int $serviceId, ?string $type = null): ?array
    {
        $query = $type === null ? [] : ['type' => $type];

        return $this->request('DELETE', '/backup.schedule/' . $serviceId, $query);
    }

    // ---------------------------------------------------------------------
    // Local IP address
    // ---------------------------------------------------------------------

    /**
     * Views the server local IP address (GET /server.ip.local/{serverID}).
     *
     * @param int $serverId Server ID.
     *
     * @return array{ip: string, netmask: string, mac: string}|null
     *
     * @throws ApiException
     */
    final public function getServerLocalIp(int $serverId): ?array
    {
        return $this->request('GET', '/server.ip.local/' . $serverId);
    }

    /**
     * Creates a server local IP address (POST /server.ip.local/{serverID}).
     *
     * @param int $serverId Server ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function createServerLocalIp(int $serverId): ?array
    {
        return $this->request('POST', '/server.ip.local/' . $serverId);
    }

    /**
     * Deletes the server local IP address (DELETE /server.ip.local/{serverID}).
     *
     * @param int $serverId Server ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteServerLocalIp(int $serverId): ?array
    {
        return $this->request('DELETE', '/server.ip.local/' . $serverId);
    }

    // ---------------------------------------------------------------------
    // IP address pool
    // ---------------------------------------------------------------------

    /**
     * List of all IP addresses assigned to the client (GET /ip).
     *
     * @return array<int, array<string, mixed>>|null
     *
     * @throws ApiException
     */
    final public function getIps(): ?array
    {
        return $this->request('GET', '/ip');
    }

    /**
     * IP address information (GET /ip/{ipID}).
     *
     * @param int $ipId IP ID.
     *
     * @return array<string, mixed>|null
     *
     * @throws ApiException
     */
    final public function getIp(int $ipId): ?array
    {
        return $this->request('GET', '/ip/' . $ipId);
    }

    // ---------------------------------------------------------------------
    // Reserved IP address
    // ---------------------------------------------------------------------

    /**
     * List of services with reserved IP addresses (GET /ip-reserve).
     *
     * @return array<int, array<string, mixed>>|null
     *
     * @throws ApiException
     */
    final public function getReservedIpServices(): ?array
    {
        return $this->request('GET', '/ip-reserve');
    }

    /**
     * Service info with reserved IP address (GET /ip-reserve/{serviceID}).
     *
     * @param int $serviceId Reserved IP service ID.
     *
     * @return array<string, mixed>|null
     *
     * @throws ApiException
     */
    final public function getReservedIpService(int $serviceId): ?array
    {
        return $this->request('GET', '/ip-reserve/' . $serviceId);
    }

    /**
     * Deletes a reserved IP service (DELETE /ip-reserve/{serviceID}).
     *
     * @param int $serviceId Reserved IP service ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteReservedIpService(int $serviceId): ?array
    {
        return $this->request('DELETE', '/ip-reserve/' . $serviceId);
    }

    // ---------------------------------------------------------------------
    // Additional IP addresses
    // ---------------------------------------------------------------------

    /**
     * List of all services with additional IP addresses (GET /server-ip).
     *
     * @return array<int, array<string, mixed>>|null
     *
     * @throws ApiException
     */
    final public function getAdditionalIpServices(): ?array
    {
        return $this->request('GET', '/server-ip');
    }

    /**
     * Services with additional IP addresses for a server (GET /server.ip/{serverID}).
     *
     * @param int $serverId Parent server ID.
     *
     * @return array<int, array<string, mixed>>|null
     *
     * @throws ApiException
     */
    final public function getServerIps(int $serverId): ?array
    {
        return $this->request('GET', '/server.ip/' . $serverId);
    }

    /**
     * Orders additional IP addresses for a server (POST /server.ip/{serverID}).
     *
     * @param int    $serverId Parent server ID.
     * @param string $type     IP address type: "4" (IPv4) or "6" (IPv6).
     * @param int    $count    Number of IP addresses.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function orderServerIps(int $serverId, string $type, int $count): ?array
    {
        return $this->request('POST', '/server.ip/' . $serverId, [], [
            'type' => $type,
            'count' => $count,
        ]);
    }

    /**
     * Deletes additional IP addresses from a server (PUT /server.ip/{serverID}).
     *
     * @param int      $serverId Parent server ID.
     * @param string   $type     IP address type: "4" (IPv4) or "6" (IPv6).
     * @param int[]    $delete   Array of IP IDs to delete (IDs from the IP pool).
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteServerIps(int $serverId, string $type, array $delete): ?array
    {
        return $this->request('PUT', '/server.ip/' . $serverId, [], [
            'type' => $type,
            'delete' => $delete,
        ]);
    }

    /**
     * Service info with additional IP addresses (GET /server-ip/{serviceID}).
     *
     * @param int $serviceId Additional IP service ID.
     *
     * @return array<string, mixed>|null
     *
     * @throws ApiException
     */
    final public function getAdditionalIpService(int $serviceId): ?array
    {
        return $this->request('GET', '/server-ip/' . $serviceId);
    }

    /**
     * Deletes additional IP addresses from an additional IP service (PUT /server-ip/{serviceID}).
     *
     * @param int   $serviceId Additional IP service ID.
     * @param int[] $delete    Array of IP IDs to delete (IDs from the IP pool).
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteAdditionalIpServiceAddresses(int $serviceId, array $delete): ?array
    {
        return $this->request('PUT', '/server-ip/' . $serviceId, [], ['delete' => $delete]);
    }

    /**
     * Deletes an additional IP service (DELETE /server-ip/{serviceID}).
     *
     * All its IP addresses will be released.
     *
     * @param int $serviceId Additional IP service ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteAdditionalIpService(int $serviceId): ?array
    {
        return $this->request('DELETE', '/server-ip/' . $serviceId);
    }

    // ---------------------------------------------------------------------
    // DNS
    // ---------------------------------------------------------------------

    /**
     * List of all DNS services (GET /dns).
     *
     * @return array<int, array<string, mixed>>|null
     *
     * @throws ApiException
     */
    final public function getDnsServices(): ?array
    {
        return $this->request('GET', '/dns');
    }

    /**
     * Creates a DNS service (POST /dns).
     *
     * @param string      $name Valid domain name (required).
     * @param string|null $ip   Valid IPv4 address used to generate default DNS records.
     *
     * @return array{id: int}|null The new DNS service ID.
     *
     * @throws ApiException
     */
    final public function createDnsService(string $name, ?string $ip = null): ?array
    {
        $body = ['name' => $name];
        if ($ip !== null) {
            $body['ip'] = $ip;
        }

        return $this->request('POST', '/dns', [], $body);
    }

    /**
     * Views DNS service data (GET /dns/{serviceID}).
     *
     * @param int $serviceId DNS service ID.
     *
     * @return array<string, mixed>|null
     *
     * @throws ApiException
     */
    final public function getDnsService(int $serviceId): ?array
    {
        return $this->request('GET', '/dns/' . $serviceId);
    }

    /**
     * Deletes a DNS service (DELETE /dns/{serviceID}).
     *
     * @param int $serviceId DNS service ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteDnsService(int $serviceId): ?array
    {
        return $this->request('DELETE', '/dns/' . $serviceId);
    }

    /**
     * Views DNS records of a DNS service (GET /dns.record/{serviceID}).
     *
     * @param int $serviceId DNS service ID.
     *
     * @return array<int, array{
     *     id: int,
     *     host: string,
     *     type: string,
     *     priority: string|null,
     *     tag: string|null,
     *     value: string,
     *     timestamp: string,
     *     can: array{update: bool, delete: bool}
     * }>|null
     *
     * @throws ApiException
     */
    final public function getDnsRecords(int $serviceId): ?array
    {
        return $this->request('GET', '/dns.record/' . $serviceId);
    }

    /**
     * Creates a DNS record (POST /dns.record/{serviceID}).
     *
     * @param int         $serviceId DNS service ID.
     * @param string      $host      Record name (domain postfix or prefix, @ and * allowed).
     * @param string      $type      Record type: A, AAAA, CNAME, MX, NS, SRV, CAA or TXT.
     * @param string      $value     Record value (required).
     * @param string|null $priority  Priority/flag for MX, SRV, CAA records.
     * @param string|null $tag       Required tag for CAA records (issue, issuewild, iodef, unknown).
     *
     * @return array{id: int}|null The new DNS record ID.
     *
     * @throws ApiException
     */
    final public function createDnsRecord(
        int $serviceId,
        string $host,
        string $type,
        string $value,
        ?string $priority = null,
        ?string $tag = null
    ): ?array {
        $body = [
            'host' => $host,
            'type' => $type,
            'value' => $value,
        ];
        if ($priority !== null) {
            $body['priority'] = $priority;
        }
        if ($tag !== null) {
            $body['tag'] = $tag;
        }

        return $this->request('POST', '/dns.record/' . $serviceId, [], $body);
    }

    /**
     * Updates a DNS record (PUT /dns.record/{recordID}).
     *
     * @param int         $recordId DNS record ID.
     * @param string      $value    New record value (required).
     * @param string|null $priority Priority/flag for MX, SRV, CAA records.
     * @param string|null $tag      Tag for CAA records (issue, issuewild, iodef, unknown).
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function updateDnsRecord(int $recordId, string $value, ?string $priority = null, ?string $tag = null): ?array
    {
        $body = ['value' => $value];
        if ($priority !== null) {
            $body['priority'] = $priority;
        }
        if ($tag !== null) {
            $body['tag'] = $tag;
        }

        return $this->request('PUT', '/dns.record/' . $recordId, [], $body);
    }

    /**
     * Deletes a DNS record (DELETE /dns.record/{recordID}).
     *
     * @param int $recordId DNS record ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteDnsRecord(int $recordId): ?array
    {
        return $this->request('DELETE', '/dns.record/' . $recordId);
    }

    // ---------------------------------------------------------------------
    // Billing
    // ---------------------------------------------------------------------

    /**
     * Operations list (GET /operation).
     *
     * @param string|null $from Filter date from.
     * @param string|null $to   Filter date to.
     *
     * @return array<int, array<string, mixed>>|null
     *
     * @throws ApiException
     */
    final public function getOperations(?string $from = null, ?string $to = null): ?array
    {
        $query = [];
        if ($from !== null) {
            $query['from'] = $from;
        }
        if ($to !== null) {
            $query['to'] = $to;
        }

        return $this->request('GET', '/operation', $query);
    }

    /**
     * Creates a balance replenishment (POST /operation).
     *
     * @param float $summ Replenishment amount (required).
     *
     * @return array{id: int}|null The new operation ID.
     *
     * @throws ApiException
     */
    final public function createOperation(float $summ): ?array
    {
        return $this->request('POST', '/operation', [], ['summ' => $summ]);
    }

    /**
     * Views an operation (GET /operation/{operationID}).
     *
     * @param int $operationId Operation ID.
     *
     * @return array<string, mixed>|null
     *
     * @throws ApiException
     */
    final public function getOperation(int $operationId): ?array
    {
        return $this->request('GET', '/operation/' . $operationId);
    }

    /**
     * Deletes an unpaid replenishment operation (DELETE /operation/{operationID}).
     *
     * @param int $operationId Operation ID.
     *
     * @return array|null
     *
     * @throws ApiException
     */
    final public function deleteOperation(int $operationId): ?array
    {
        return $this->request('DELETE', '/operation/' . $operationId);
    }

    // ---------------------------------------------------------------------
    // HTTP transport
    // ---------------------------------------------------------------------

    /**
     * Performs an HTTP request against the API and returns the `data` member
     * of the response envelope.
     *
     * @param string         $method HTTP method (GET/POST/PUT/DELETE).
     * @param string         $path   URL path appended to the base URL (leading "/").
     * @param array<string, mixed> $query Query string parameters.
     * @param array<string, mixed>|null $body JSON request body.
     *
     * @return array<string, mixed>|null
     *
     * @throws ApiException On transport errors, malformed responses, HTTP errors
     *                      (>= 400) and API logical errors (status === "error").
     */
    private function request(string $method, string $path, array $query = [], ?array $body = null): ?array
    {
        $url = $this->baseUrl . $path;
        if ($query !== []) {
            $url .= '?' . http_build_query($query);
        }

        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->token,
        ];

        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_CONNECTTIMEOUT => $this->timeout,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_USERAGENT => $this->userAgent,
        ];

        switch ($method) {
            case 'GET':
                $options[CURLOPT_HTTPGET] = true;
                break;
            case 'POST':
                $options[CURLOPT_POST] = true;
                break;
            case 'PUT':
            case 'DELETE':
                $options[CURLOPT_CUSTOMREQUEST] = $method;
                break;
        }

        if ($body !== null) {
            try {
                $options[CURLOPT_POSTFIELDS] = json_encode($body, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            } catch (JsonException $e) {
                throw new ApiException(
                    'Failed to encode request body as JSON: ' . $e->getMessage(),
                    0,
                    null,
                    null,
                    null,
                    $e
                );
            }
        }

        // User-supplied cURL options take precedence over the SDK defaults.
        if ($this->curlOptions !== []) {
            $options = $this->curlOptions + $options;
        }

        $ch = curl_init($url);
        if ($ch === false) {
            throw new ApiException('Failed to initialize cURL session', 0);
        }
        if (!curl_setopt_array($ch, $options)) {
            $curlError = curl_error($ch);
            curl_close($ch);
            throw new ApiException('Failed to configure cURL session: ' . $curlError, 0);
        }

        $response = curl_exec($ch);
        $httpCode = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            throw new ApiException('cURL transport error: ' . $curlError, 0);
        }

        try {
            $decoded = json_decode((string)$response, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new ApiException(
                'Invalid JSON response from API (HTTP ' . $httpCode . '): ' . substr((string) $response, 0, 200),
                $httpCode,
                null,
                null,
                null,
                $e
            );
        }
        if (!is_array($decoded)) {
            throw new ApiException(
                'Invalid JSON response from API (HTTP ' . $httpCode . '): ' . substr((string) $response, 0, 200),
                $httpCode
            );
        }

        $this->lastResponse = $decoded;
        $this->lastHttpCode = $httpCode;

        // API logical error (envelope status === "error").
        if (($decoded['status'] ?? null) === 'error') {
            throw new ApiException(
                $this->formatErrorMessage($decoded),
                $httpCode,
                isset($decoded['status_msg']) ? (string) $decoded['status_msg'] : null,
                isset($decoded['description']) ? (string) $decoded['description'] : null,
                $decoded['data'] ?? null
            );
        }

        // Non-successful HTTP status.
        if ($httpCode >= 400) {
            throw new ApiException(
                $this->formatErrorMessage($decoded),
                $httpCode,
                isset($decoded['status_msg']) ? (string) $decoded['status_msg'] : null,
                isset($decoded['description']) ? (string) $decoded['description'] : null,
                $decoded['data'] ?? null
            );
        }

        return $decoded['data'] ?? null;
    }

    /**
     * Builds a human-readable error message from a decoded error envelope.
     *
     * @param array<string, mixed> $decoded Decoded API error response.
     */
    private function formatErrorMessage(array $decoded): string
    {
        $message = isset($decoded['status_msg']) ? (string) $decoded['status_msg'] : 'API error';
        if (!empty($decoded['description'])) {
            $message .= ': ' . $decoded['description'];
        }

        return $message;
    }

    /**
     * Builds the base URL from host, version and scheme, stripping any
     * redundant slashes and honouring a scheme already present in the host.
     *
     * @param string $host    Target host (optionally with scheme).
     * @param string $version API version prefix.
     * @param string $scheme  Default scheme used when `$host` has none.
     */
    private function buildBaseUrl(string $host, string $version, string $scheme): string
    {
        $host = rtrim($host, '/');
        if (!preg_match('~^[a-z][a-z0-9+.-]*://~i', $host)) {
            $host = $scheme . '://' . $host;
        }
        $version = trim($version, '/');

        return $host . '/' . $version;
    }
}
