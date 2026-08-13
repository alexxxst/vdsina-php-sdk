<?php

namespace VDSina\Client;

use JsonException;
use RuntimeException;

/**
 * VDSina Public API Client
 * 
 * A compact PHP SDK for interacting with the VDSina public API.
 */
final class Client
{
    private string $baseUrl;
    private string $token;

    /**
     * @param string $token API authorization token
     * @param string $host The target host (e.g., 'userapi.vdsina.com' or 'userapi.vdsina.ru')
     * @param string $version API version (default: 'v1')
     */
    public function __construct(string $token, string $host = 'userapi.vdsina.com', string $version = 'v1')
    {
        $this->baseUrl = sprintf('https://%s/%s', rtrim($host, '/'), ltrim($version, '/'));
        $this->token = $token;
    }

    private function request(string $method, string $endpoint, ?array $queryParams = null, ?array $body = null): array
    {
        $url = $this->baseUrl . $endpoint;
        if (!empty($queryParams)) {
            $url .= '?' . http_build_query($queryParams);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->token,
            'Content-Type: application/json',
            'Accept: application/json',
        ]);

        if ($body !== null) {
            try {
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body, JSON_THROW_ON_ERROR));
            } catch (JsonException $e) {
                throw new RuntimeException('Json Error: ' . $e->getMessage());
            }
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            throw new RuntimeException('Curl Error: $error');
        }

        try {
            $decoded = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new RuntimeException('Json Error: ' . $e->getMessage());
        }

        if ($httpCode >= 400 && $decoded === null) {
            throw new RuntimeException('HTTP Error ' . $httpCode . ': ' . $response);
        }

        return $decoded ?? [];
    }

    // --- Account ---

    /**
     * Account information and shutdown forecast.
     *
     * Returns the account ID and name, creation date, and the shutdown forecast date
     * (the date before which there are enough funds to pay for all services).
     * The `can` object lists account features: the ability to create new users,
     * order new services, and withdraw money.
     *
     * @return array Response with keys: status, status_msg, data (account info, created, forecast, can)
     */
    public function getAccount(): array
    {
        return $this->request('GET', '/account');
    }

    /**
     * Account balance.
     *
     * Returns all available balances: main (real), bonus, and partner.
     * If there have been no transactions on the account, the balance is not returned.
     *
     * @return array Response with keys: status, status_msg, data (real, bonus, partner)
     */
    public function getBalance(): array
    {
        return $this->request('GET', '/account.balance');
    }

    /**
     * Account limits.
     *
     * For each type of service, an object is returned specifying restrictions:
     * `max` – the maximum of services of this type in the account,
     * `child_max` – the maximum of services of this type in the parent service,
     * `now` – the number of ordered services of this type at the moment.
     *
     * @return array Response with keys: status, status_msg, data (per-service limits)
     */
    public function getLimits(): array
    {
        return $this->request('GET', '/account.limit');
    }

    /**
     * Registration of a new account.
     *
     * Requires the API token of an existing client and an existing affiliate code.
     * The owner of the affiliate code must have enabled the ability to register
     * new accounts (contact provider support for more information).
     *
     * @param array $data Data with keys: email (string, required – new client login),
     *                    code (string, required – partner code)
     * @return array Response with keys: status, status_msg, data (account and user info)
     */
    public function registerAccount(array $data): array
    {
        return $this->request('POST', '/register', [], $data);
    }

    // --- SSH Key ---

    /**
     * Get SSH keys list.
     *
     * @return array Response with keys: status, status_msg, data (array of SSH keys with id and name)
     */
    public function listSshKeys(): array
    {
        return $this->request('GET', '/ssh-key');
    }

    /**
     * Create new SSH key.
     *
     * @param array $data Data with keys: name (string), data (string - key string representation)
     * @return array Response with keys: status, status_msg, data (with created key id)
     */
    public function createSshKey(array $data): array
    {
        return $this->request('POST', '/ssh-key', [], $data);
    }

    /**
     * View one SSH key.
     *
     * @param int $keyId SSH key ID
     * @return array Response with keys: status, status_msg, data (id, name, status, data)
     */
    public function getSshKey(int $keyId): array
    {
        return $this->request('GET', '/ssh-key/' . $keyId);
    }

    /**
     * Update SSH key.
     *
     * @param int $keyId SSH key ID
     * @param array $data Data with keys: name (string), data (string - key string representation)
     * @return array Response with keys: status, status_msg
     */
    public function updateSshKey(int $keyId, array $data): array
    {
        return $this->request('PUT', '/ssh-key/' . $keyId, [], $data);
    }

    /**
     * Delete SSH key.
     *
     * @param int $keyId SSH key ID
     * @return array Response with keys: status, status_msg
     */
    public function deleteSshKey(int $keyId): array
    {
        return $this->request('DELETE', '/ssh-key/' . $keyId);
    }

    // --- ISO ---

    /**
     * Get ISO list.
     *
     * @return array Response with keys: status, status_msg, data (array of ISO objects)
     */
    public function listIso(): array
    {
        return $this->request('GET', '/iso');
    }

    /**
     * Download ISO.
     *
     * Start downloading an ISO file from a URL. The file must be in
     * application/x-iso9660-image or application/x-iso-image MIME format,
     * maximum 10 GB. Protocols: http, https, ftp, ftps.
     *
     * @param string $url Direct URL to the ISO file
     * @return array Response with keys: status, status_msg, data (id – download job key)
     */
    public function downloadIso(string $url): array
    {
        return $this->request('POST', '/iso', [], ['url' => $url]);
    }

    /**
     * Check ISO download status.
     *
     * Periodically poll with the download KEY to check whether the file has loaded.
     * The `data.status` field returns "processing", "done", or "error".
     *
     * @param string $key ISO download job KEY (32-character hex string)
     * @return array Response with keys: status, status_msg, data (status, description)
     */
    public function checkIsoStatus(string $key): array
    {
        return $this->request('GET', '/iso/' . $key);
    }

    /**
     * Create new ISO service from a downloaded file.
     *
     * @param string $key ISO download job KEY (32-character hex string)
     * @return array Response with keys: status, status_msg, data (id – new ISO service ID)
     */
    public function createIsoService(string $key): array
    {
        return $this->request('POST', '/iso/' . $key);
    }

    /**
     * View ISO service information.
     *
     * @param int $isoId ISO service ID
     * @return array Response with keys: status, status_msg, data (ISO object)
     */
    public function getIso(int $isoId): array
    {
        return $this->request('GET', '/iso/' . $isoId);
    }

    /**
     * Delete ISO service.
     *
     * @param int $isoId ISO service ID
     * @return array Response with keys: status, status_msg
     */
    public function deleteIso(int $isoId): array
    {
        return $this->request('DELETE', '/iso/' . $isoId);
    }

    // --- Server ---

    /**
     * Servers list.
     *
     * @return array Response with keys: status, status_msg, data (array of server objects)
     */
    public function listServers(): array
    {
        return $this->request('GET', '/server');
    }

    /**
     * Create new server.
     *
     * @param array $data Server creation parameters (datacenter, server-plan required;
     *                     optional: name, template, backup, schedule, ssh-key, iso,
     *                     host, cpu, ram, disk, gpu, ip4, ip-reserve)
     * @return array Response with keys: status, status_msg, data (id – new server ID)
     */
    public function createServer(array $data): array
    {
        return $this->request('POST', '/server', [], $data);
    }

    /**
     * View server info.
     *
     * @param int $serverId Server ID
     * @return array Response with keys: status, status_msg, data (full server information)
     */
    public function getServer(int $serverId): array
    {
        return $this->request('GET', '/server/' . $serverId);
    }

    /**
     * Update server parameters.
     *
     * @param int $serverId Server ID
     * @param array $data Update data with keys: name (string, required),
     *                    autoprolong (string '0'|'1'), reserve_ip (string '0'|'1'),
     *                    autorun (string '0'|'1')
     * @return array Response with keys: status, status_msg
     */
    public function updateServer(int $serverId, array $data): array
    {
        return $this->request('PUT', '/server/' . $serverId, [], $data);
    }

    /**
     * Delete server.
     *
     * @param int $serverId Server ID
     * @return array Response with keys: status, status_msg
     */
    public function deleteServer(int $serverId): array
    {
        return $this->request('DELETE', '/server/' . $serverId);
    }

    /**
     * Server reboot.
     *
     * @param int $serverId Server ID
     * @param string $type Reboot type: 'soft' (default, sends reboot signal) or
     *                      'hard' (shuts down forcibly if needed, then starts again)
     * @return array Response with keys: status, status_msg
     */
    public function rebootServer(int $serverId, string $type = 'soft'): array
    {
        return $this->request('PUT', '/server.reboot/' . $serverId, [], ['type' => $type]);
    }

    /**
     * Reinstall server.
     *
     * Reinstall the operating system on the server.
     *
     * @param int $serverId Server ID
     * @param array $data Reinstall data with optional keys: template (int),
     *                    ssh-key (int), host (string)
     * @return array Response with keys: status, status_msg
     */
    public function reinstallServer(int $serverId, array $data): array
    {
        return $this->request('PUT', '/server.reinstall/' . $serverId, [], $data);
    }

    /**
     * Get server default password.
     *
     * @param int $serverId Server ID
     * @return array Response with keys: status, status_msg, data (user, password)
     */
    public function getServerPassword(int $serverId): array
    {
        return $this->request('GET', '/server.password/' . $serverId);
    }

    /**
     * Set server password.
     *
     * The server will be restarted. The root user password will be set in
     * supported Linux distributions. Does not affect ISO-installed OS,
     * Windows, or FreeBSD.
     *
     * @param int $serverId Server ID
     * @param string $password New superuser password
     * @return array Response with keys: status, status_msg
     */
    public function setServerPassword(int $serverId, string $password): array
    {
        return $this->request('PUT', '/server.password/' . $serverId, [], ['password' => $password]);
    }

    /**
     * Change server tariff plan.
     *
     * Changing to a lower-tier plan is technically impossible.
     * The server will be restarted.
     *
     * @param int $serverId Server ID
     * @param array $data Plan change data with keys: server-plan (int, required),
     *                    cpu (int), ram (int), disk (int), gpu (int) – for constructor tariffs
     * @return array Response with keys: status, status_msg
     */
    public function changeServerPlan(int $serverId, array $data): array
    {
        return $this->request('PUT', '/server.plan/' . $serverId, [], $data);
    }

    /**
     * Prolong and start server.
     *
     * Use when the server was not started after payment
     * (e.g., due to disabled auto-renewal).
     *
     * @param int $serverId Server ID
     * @return array Response with keys: status, status_msg
     */
    public function prolongServer(int $serverId): array
    {
        return $this->request('PUT', '/server.prolong/' . $serverId);
    }

    /**
     * Attach ISO to server.
     *
     * The server will be restarted.
     *
     * @param int $serverId Server ID
     * @param int $isoId ISO service ID
     * @return array Response with keys: status, status_msg
     */
    public function attachIso(int $serverId, int $isoId): array
    {
        return $this->request('PUT', '/server.iso/' . $serverId, [], ['iso' => $isoId]);
    }

    /**
     * Detach ISO from server.
     *
     * The server will be restarted.
     *
     * @param int $serverId Server ID
     * @return array Response with keys: status, status_msg
     */
    public function detachIso(int $serverId): array
    {
        return $this->request('DELETE', '/server.iso/' . $serverId);
    }

    /**
     * Server statistics.
     *
     * By default, returns statistics for the last 30 days. When specifying `from`
     * and `to`, statistics for the specified period are returned.
     * Statistics are displayed in hourly blocks.
     *
     * @param int $serverId Server ID
     * @param string|null $from Filter date from
     * @param string|null $to Filter date to
     * @return array Response with keys: status, status_msg, data (array of hourly stat objects)
     */
    public function getServerStat(int $serverId, ?string $from = null, ?string $to = null): array
    {
        $params = array_filter(['from' => $from, 'to' => $to]);
        return $this->request('GET', '/server.stat/' . $serverId, $params);
    }

    /**
     * View info about server local IP address.
     *
     * @param int $serverId Server ID
     * @return array Response with keys: status, status_msg, data (ip, netmask, mac)
     */
    public function getServerLocalIp(int $serverId): array
    {
        return $this->request('GET', '/server.ip.local/' . $serverId);
    }

    /**
     * Create server local IP address.
     *
     * The local network is available within the datacenter (public local network).
     *
     * @param int $serverId Server ID
     * @return array Response with keys: status, status_msg
     */
    public function createServerLocalIp(int $serverId): array
    {
        return $this->request('POST', '/server.ip.local/' . $serverId);
    }

    /**
     * Delete server local IP address.
     *
     * @param int $serverId Server ID
     * @return array Response with keys: status, status_msg
     */
    public function deleteServerLocalIp(int $serverId): array
    {
        return $this->request('DELETE', '/server.ip.local/' . $serverId);
    }

    // --- IP Address ---

    /**
     * IP pool.
     *
     * Returns a list of all IP addresses assigned to the client.
     *
     * @return array Response with keys: status, status_msg, data (array of IPv4/IPv6 objects)
     */
    public function listIpPool(): array
    {
        return $this->request('GET', '/ip');
    }

    /**
     * IP information.
     *
     * @param int $ipId IP ID
     * @return array Response with keys: status, status_msg, data (IPv4 or IPv6 object with full info)
     */
    public function getIpInfo(int $ipId): array
    {
        return $this->request('GET', '/ip/' . $ipId);
    }

    /**
     * All services list with additional IP addresses.
     *
     * @return array Response with keys: status, status_msg, data (array of IPservice objects)
     */
    public function listServerIps(): array
    {
        return $this->request('GET', '/server-ip');
    }

    /**
     * Services list with additional IP addresses filtered by parent server ID.
     *
     * @param int $serverId Server ID
     * @return array Response with keys: status, status_msg, data (array of IPservice objects)
     */
    public function getServerIps(int $serverId): array
    {
        return $this->request('GET', '/server.ip/' . $serverId);
    }

    /**
     * Order additional IP addresses for server.
     *
     * @param int $serverId Server ID
     * @param array $data Data with keys: type (string '4'|'6'), count (int)
     * @return array Response with keys: status, status_msg
     */
    public function orderServerIps(int $serverId, array $data): array
    {
        return $this->request('POST', '/server.ip/' . $serverId, [], $data);
    }

    /**
     * Delete additional IP addresses for server.
     *
     * Deletes specific IP addresses by their IDs from the server.
     *
     * @param int $serverId Server ID
     * @param array $data Data with keys: type (string '4'|'6'), delete (array of IP IDs)
     * @return array Response with keys: status, status_msg
     */
    public function deleteServerIps(int $serverId, array $data): array
    {
        return $this->request('PUT', '/server.ip/' . $serverId, [], $data);
    }

    /**
     * Delete additional IP service.
     *
     * The additional IP service will be deleted, all its IP addresses will be released.
     *
     * @param int $serviceId Additional IP Service ID
     * @return array Response with keys: status, status_msg
     */
    public function deleteAdditionalIpService(int $serviceId): array
    {
        return $this->request('DELETE', '/server-ip/' . $serviceId);
    }

    /**
     * Service info with additional IP addresses.
     *
     * View a service with additional IP addresses by service ID.
     *
     * @param int $serviceId Additional IP Service ID
     * @return array Response with keys: status, status_msg, data (IPservice object)
     */
    public function getAdditionalIpService(int $serviceId): array
    {
        return $this->request('GET', '/server-ip/' . $serviceId);
    }

    /**
     * Delete additional IP addresses for service.
     *
     * Deletes IP addresses by list from the additional IP service.
     *
     * @param int $serviceId Additional IP Service ID
     * @param array $data Data with key: delete (array of IP IDs from IP pool)
     * @return array Response with keys: status, status_msg
     */
    public function deleteAdditionalIpAddresses(int $serviceId, array $data): array
    {
        return $this->request('PUT', '/server-ip/' . $serviceId, [], $data);
    }

    // --- Reserved IP ---

    /**
     * All services list with reserved IP addresses.
     *
     * @return array Response with keys: status, status_msg, data (array of IPservice objects)
     */
    public function listReservedIps(): array
    {
        return $this->request('GET', '/ip-reserve');
    }

    /**
     * Service info with reserved IP address.
     *
     * View a service with a reserved IP address by service ID.
     *
     * @param int $serviceId Service ID
     * @return array Response with keys: status, status_msg, data (IPservice object)
     */
    public function getReservedIp(int $serviceId): array
    {
        return $this->request('GET', '/ip-reserve/' . $serviceId);
    }

    /**
     * Delete reserved IP service.
     *
     * The reserved IP service will be deleted, its IP address will be released.
     *
     * @param int $serviceId Service ID
     * @return array Response with keys: status, status_msg
     */
    public function deleteReservedIp(int $serviceId): array
    {
        return $this->request('DELETE', '/ip-reserve/' . $serviceId);
    }

    // --- DNS ---

    /**
     * All services list with DNS.
     *
     * @return array Response with keys: status, status_msg, data (array of DNS objects)
     */
    public function listDnsServices(): array
    {
        return $this->request('GET', '/dns');
    }

    /**
     * Create DNS service.
     *
     * @param array $data Data with keys: name (string, required – valid domain name),
     *                    ip (string, optional – IPv4 for generating default DNS records)
     * @return array Response with keys: status, status_msg, data (id – new DNS service ID)
     */
    public function createDnsService(array $data): array
    {
        return $this->request('POST', '/dns', [], $data);
    }

    /**
     * View DNS service data.
     *
     * @param int $serviceId DNS Service ID
     * @return array Response with keys: status, status_msg, data (DNS object)
     */
    public function getDnsService(int $serviceId): array
    {
        return $this->request('GET', '/dns/' . $serviceId);
    }

    /**
     * Delete DNS service.
     *
     * @param int $serviceId DNS Service ID
     * @return array Response with keys: status, status_msg
     */
    public function deleteDnsService(int $serviceId): array
    {
        return $this->request('DELETE', '/dns/' . $serviceId);
    }

    /**
     * View DNS records of a DNS service.
     *
     * @param int $serviceId DNS Service ID
     * @return array Response with keys: status, status_msg, data (id, host, type,
     *               priority, tag, value, timestamp, can)
     */
    public function getDnsRecords(int $serviceId): array
    {
        return $this->request('GET', '/dns.record/' . $serviceId);
    }

    /**
     * Create DNS record for a DNS service.
     *
     * @param int $serviceId DNS Service ID
     * @param array $data Record data with keys: host (string, required), type (string, required),
     *                    value (string, required), priority (string|null), tag (string|null)
     * @return array Response with keys: status, status_msg, data (id – new DNS record ID)
     */
    public function createDnsRecord(int $serviceId, array $data): array
    {
        return $this->request('POST', '/dns.record/' . $serviceId, [], $data);
    }

    /**
     * Update DNS record.
     *
     * @param int $recordId DNS record ID
     * @param array $data Record data with keys: value (string, required),
     *                    priority (string|null), tag (string|null)
     * @return array Response with keys: status, status_msg
     */
    public function updateDnsRecord(int $recordId, array $data): array
    {
        return $this->request('PUT', '/dns.record/' . $recordId, [], $data);
    }

    /**
     * Delete DNS record.
     *
     * @param int $recordId DNS record ID
     * @return array Response with keys: status, status_msg
     */
    public function deleteDnsRecord(int $recordId): array
    {
        return $this->request('DELETE', '/dns.record/' . $recordId);
    }

    // --- Backup ---

    /**
     * Backups list.
     *
     * @return array Response with keys: status, status_msg, data (Backup object or array)
     */
    public function listBackups(): array
    {
        return $this->request('GET', '/backup');
    }

    /**
     * View backup information.
     *
     * @param int $backupId Backup ID
     * @return array Response with keys: status, status_msg, data (Backup object)
     */
    public function getBackup(int $backupId): array
    {
        return $this->request('GET', '/backup/' . $backupId);
    }

    /**
     * Create new backup of a service.
     *
     * The backup will be created in the same datacenter where the service is located.
     *
     * @param int $serviceId Service ID (server or external disk)
     * @return array Response with keys: status, status_msg
     */
    public function createBackup(int $serviceId): array
    {
        return $this->request('POST', '/backup/' . $serviceId);
    }

    /**
     * Update backup information.
     *
     * @param int $backupId Backup ID
     * @param array $data Update data with keys: name (string, required),
     *                    autoprolong (string '0'|'1')
     * @return array Response with keys: status, status_msg
     */
    public function updateBackup(int $backupId, array $data): array
    {
        return $this->request('PUT', '/backup/' . $backupId, [], $data);
    }

    /**
     * Delete backup.
     *
     * @param int $backupId Backup ID
     * @return array Response with keys: status, status_msg
     */
    public function deleteBackup(int $backupId): array
    {
        return $this->request('DELETE', '/backup/' . $backupId);
    }

    /**
     * Restore backup to a service.
     *
     * Service and backup must be in the same datacenter.
     * Service disk size must not be smaller than backup size.
     *
     * @param int $backupId Backup ID
     * @param array $data Restore data with key: service (int – service ID to restore to)
     * @return array Response with keys: status, status_msg
     */
    public function restoreBackup(int $backupId, array $data): array
    {
        return $this->request('PUT', '/backup.restore/' . $backupId, [], $data);
    }

    /**
     * Copy backup to another datacenter.
     *
     * @param int $backupId Backup ID
     * @param int $datacenterId Datacenter ID to copy to
     * @return array Response with keys: status, status_msg, data (id – new backup ID)
     */
    public function copyBackup(int $backupId, int $datacenterId): array
    {
        return $this->request('POST', '/backup.copy/' . $backupId, [], ['datacenter' => $datacenterId]);
    }

    /**
     * Backup schedule list.
     *
     * @param int $serviceId Service ID (server or external disk)
     * @return array Response with keys: status, status_msg, data (day, week, month schedules)
     */
    public function getBackupSchedules(int $serviceId): array
    {
        return $this->request('GET', '/backup.schedule/' . $serviceId);
    }

    /**
     * Create backup schedule.
     *
     * When using different schedule types together for one service,
     * it is recommended to set the same hour to avoid data loss.
     *
     * @param int $serviceId Service ID (server or external disk)
     * @param array $data Schedule data – one of ScheduleDay, ScheduleWeek, or ScheduleMonth
     *                    (must include: type, left, hour; plus day for week/month)
     * @return array Response with keys: status, status_msg
     */
    public function createBackupSchedule(int $serviceId, array $data): array
    {
        return $this->request('POST', '/backup.schedule/' . $serviceId, [], $data);
    }

    /**
     * Delete backup schedule.
     *
     * @param int $serviceId Service ID (server or external disk)
     * @param string|null $type Schedule type to delete: 'day', 'week', or 'month'.
     *                          If not specified, all schedules will be deleted.
     * @return array Response with keys: status, status_msg
     */
    public function deleteBackupSchedule(int $serviceId, ?string $type = null): array
    {
        $params = $type ? ['type' => $type] : [];
        return $this->request('DELETE', '/backup.schedule/' . $serviceId, $params);
    }

    // --- Operations (Billing) ---

    /**
     * Operations list (billing history).
     *
     * @param string|null $from Filter date from
     * @param string|null $to Filter date to
     * @return array Response with keys: status, status_msg, data (array of Operation objects)
     */
    public function listOperations(?string $from = null, ?string $to = null): array
    {
        $params = array_filter(['from' => $from, 'to' => $to]);
        return $this->request('GET', '/operation', $params);
    }

    /**
     * Create balance replenishment.
     *
     * @param float $summ Amount to replenish
     * @return array Response with keys: status, status_msg, data (id – operation ID)
     */
    public function createReplenishment(float $summ): array
    {
        return $this->request('POST', '/operation', [], ['summ' => $summ]);
    }

    /**
     * View operation details.
     *
     * @param int $operationId Operation ID
     * @return array Response with keys: status, status_msg, data (Operation object)
     */
    public function getOperation(int $operationId): array
    {
        return $this->request('GET', '/operation/' . $operationId);
    }

    /**
     * Delete unpaid replenishment operation.
     *
     * @param int $operationId Operation ID
     * @return array Response with keys: status, status_msg
     */
    public function deleteUnpaidOperation(int $operationId): array
    {
        return $this->request('DELETE', '/operation/' . $operationId);
    }

    // --- Helpers ---

    /**
     * List of tariff plan groups.
     *
     * Returns a list of tariff plan groups with brief descriptions.
     * The group IDs should be used when requesting tariff plans.
     *
     * @return array Response with keys: status, status_msg, data (array of group objects)
     */
    public function getServerGroups(): array
    {
        return $this->request('GET', '/server-group');
    }

    /**
     * List of datacenters.
     *
     * Returns a list of datacenters. The `active` flag indicates
     * the possibility of ordering a server in a specific datacenter.
     *
     * @return array Response with keys: status, status_msg, data (array of datacenter objects)
     */
    public function getDatacenters(): array
    {
        return $this->request('GET', '/datacenter');
    }

    /**
     * List of OS templates.
     *
     * Returns a list of operating system templates available for installing
     * or reinstalling a server. The `active` flag indicates ordering availability.
     * The `ssh-key` flag indicates SSH key authorization support.
     * The `limits` object specifies minimum system requirements.
     *
     * @return array Response with keys: status, status_msg, data (array of template objects)
     */
    public function getTemplates(): array
    {
        return $this->request('GET', '/template');
    }

    /**
     * List of tariff plans for a server group.
     *
     * Returns tariff plans by group ID, including cost, characteristics,
     * and optional constructor parameters.
     *
     * @param int $groupId Tariff plan group ID
     * @return array Response with keys: status, status_msg, data (array of plan objects)
     */
    public function getServerPlans(int $groupId): array
    {
        return $this->request('GET', '/server-plan/' . $groupId);
    }

}
