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

    public function getAccount(): array
    {
        return $this->request('GET', '/account');
    }

    public function getBalance(): array
    {
        return $this->request('GET', '/account.balance');
    }

    public function getLimits(): array
    {
        return $this->request('GET', '/account.limit');
    }

    // --- SSH Key ---

    public function listSshKeys(): array
    {
        return $this->request('GET', '/ssh-key');
    }

    public function createSshKey(array $data): array
    {
        return $this->request('POST', '/ssh-key', [], $data);
    }

    public function getSshKey(int $keyId): array
    {
        return $this->request('GET', '/ssh-key/' . $keyId);
    }

    public function updateSshKey(int $keyId, array $data): array
    {
        return $this->request('PUT', '/ssh-key/' . $keyId, [], $data);
    }

    public function deleteSshKey(int $keyId): array
    {
        return $this->request('DELETE', '/ssh-key/' . $keyId);
    }

    // --- ISO ---

    public function listIso(): array
    {
        return $this->request('GET', '/iso');
    }

    public function downloadIso(string $url): array
    {
        return $this->request('POST', '/iso', [], ['url' => $url]);
    }

    public function checkIsoStatus(string $key): array
    {
        return $this->request('GET', '/iso/' . $key);
    }

    public function createIsoService(string $key): array
    {
        return $this->request('POST', '/iso/' . $key);
    }

    public function getIso(int $isoId): array
    {
        return $this->request('GET', '/iso/' . $isoId);
    }

    public function deleteIso(int $isoId): array
    {
        return $this->request('DELETE', '/iso/' . $isoId);
    }

    // --- Server ---

    public function listServers(): array
    {
        return $this->request('GET', '/server');
    }

    public function createServer(array $data): array
    {
        return $this->request('POST', '/server', [], $data);
    }

    public function getServer(int $serverId): array
    {
        return $this->request('GET', '/server/' . $serverId);
    }

    public function updateServer(int $serverId, array $data): array
    {
        return $this->request('PUT', '/server/' . $serverId, [], $data);
    }

    public function deleteServer(int $serverId): array
    {
        return $this->request('DELETE', '/server/' . $serverId);
    }

    public function rebootServer(int $serverId, string $type = 'soft'): array
    {
        return $this->request('PUT', '/server.reboot/' . $serverId, [], ['type' => $type]);
    }

    public function reinstallServer(int $serverId, array $data): array
    {
        return $this->request('PUT', '/server.reinstall/' . $serverId, [], $data);
    }

    public function getServerPassword(int $serverId): array
    {
        return $this->request('GET', '/server.password/' . $serverId);
    }

    public function setServerPassword(int $serverId, string $password): array
    {
        return $this->request('PUT', '/server.password/' . $serverId, [], ['password' => $password]);
    }

    public function changeServerPlan(int $serverId, array $data): array
    {
        return $this->request('PUT', '/server.plan/' . $serverId, [], $data);
    }

    public function prolongServer(int $serverId): array
    {
        return $this->request('PUT', '/server.prolong/' . $serverId);
    }

    public function attachIso(int $serverId, int $isoId): array
    {
        return $this->request('PUT', '/server.iso/' . $serverId, [], ['iso' => $isoId]);
    }

    public function detachIso(int $serverId): array
    {
        return $this->request('DELETE', '/server.iso/' . $serverId);
    }

    public function getServerStat(int $serverId, ?string $from = null, ?string $to = null): array
    {
        $params = array_filter(['from' => $from, 'to' => $to]);
        return $this->request('GET', '/server.stat/' . $serverId, $params);
    }

    public function getServerLocalIp(int $serverId): array
    {
        return $this->request('GET', '/server.ip.local/' . $serverId);
    }

    public function createServerLocalIp(int $serverId): array
    {
        return $this->request('POST', '/server.ip.local/' . $serverId);
    }

    public function deleteServerLocalIp(int $serverId): array
    {
        return $this->request('DELETE', '/server.ip.local/' . $serverId);
    }

    // --- IP Address ---

    public function listIpPool(): array
    {
        return $this->request('GET', '/ip');
    }

    public function getIpInfo(int $ipId): array
    {
        return $this->request('GET', '/ip/' . $ipId);
    }

    public function listServerIps(): array
    {
        return $this->request('GET', '/server-ip');
    }

    public function getServerIps(int $serverId): array
    {
        return $this->request('GET', '/server.ip/' . $serverId);
    }

    public function orderServerIps(int $serverId, array $data): array
    {
        return $this->request('POST', '/server.ip/' . $serverId, [], $data);
    }

    public function deleteServerIps(int $serverId, array $data): array
    {
        return $this->request('PUT', '/server.ip/' . $serverId, [], $data);
    }

    public function deleteAdditionalIpService(int $serviceId): array
    {
        return $this->request('DELETE', '/server-ip/' . $serviceId);
    }

    // --- DNS ---

    public function listDnsServices(): array
    {
        return $this->request('GET', '/dns');
    }

    public function createDnsService(array $data): array
    {
        return $this->request('POST', '/dns', [], $data);
    }

    public function getDnsService(int $serviceId): array
    {
        return $this->request('GET', '/dns/' . $serviceId);
    }

    public function deleteDnsService(int $serviceId): array
    {
        return $this->request('DELETE', '/dns/' . $serviceId);
    }

    public function getDnsRecords(int $serviceId): array
    {
        return $this->request('GET', '/dns.record/' . $serviceId);
    }

    public function createDnsRecord(int $serviceId, array $data): array
    {
        return $this->request('POST', '/dns.record/' . $serviceId, [], $data);
    }

    public function updateDnsRecord(int $recordId, array $data): array
    {
        return $this->request('PUT', '/dns.record/' . $recordId, [], $data);
    }

    public function deleteDnsRecord(int $recordId): array
    {
        return $this->request('DELETE', '/dns.record/' . $recordId);
    }

    // --- Backup ---

    public function listBackups(): array
    {
        return $this->request('GET', '/backup');
    }

    public function getBackup(int $backupId): array
    {
        return $this->request('GET', '/backup/' . $backupId);
    }

    public function createBackup(int $serviceId): array
    {
        return $this->request('POST', '/backup/' . $serviceId);
    }

    public function updateBackup(int $backupId, array $data): array
    {
        return $this->request('PUT', '/backup/' . $backupId, [], $data);
    }

    public function deleteBackup(int $backupId): array
    {
        return $this->request('DELETE', '/backup/' . $backupId);
    }

    public function restoreBackup(int $backupId, array $data): array
    {
        return $this->request('PUT', '/backup.restore/' . $backupId, [], $data);
    }

    public function copyBackup(int $backupId, int $datacenterId): array
    {
        return $this->request('POST', '/backup.copy/' . $backupId, [], ['datacenter' => $datacenterId]);
    }

    public function getBackupSchedules(int $serviceId): array
    {
        return $this->request('GET', '/backup.schedule/' . $serviceId);
    }

    public function createBackupSchedule(int $serviceId, array $data): array
    {
        return $this->request('POST', '/backup.schedule/' . $serviceId, [], $data);
    }

    public function deleteBackupSchedule(int $serviceId, ?string $type = null): array
    {
        $params = $type ? ['type' => $type] : [];
        return $this->request('DELETE', '/backup.schedule/' . $serviceId, $params);
    }

    // --- Operations (Billing) ---

    public function listOperations(?string $from = null, ?string $to = null): array
    {
        $params = array_filter(['from' => $from, 'to' => $to]);
        return $this->request('GET', '/operation', $params);
    }

    public function createReplenishment(float $summ): array
    {
        return $this->request('POST', '/operation', [], ['summ' => $summ]);
    }

    public function getOperation(int $operationId): array
    {
        return $this->request('GET', '/operation/' . $operationId);
    }

    public function deleteUnpaidOperation(int $operationId): array
    {
        return $this->request('DELETE', '/operation/' . $operationId);
    }

    // --- Helpers ---
    public function getServerGroups(): array
    {
        return $this->request('GET', '/server-group');
    }
    public function getDatacenters(): array
    {
        return $this->request('GET', '/datacenter');
    }
    public function getTemplates(): array
    {
        return $this->request('GET', '/template');
    }
    public function getServerPlans(int $groupId): array
    {
        return $this->request('GET', '/server-plan/' . $groupId);
    }

}
