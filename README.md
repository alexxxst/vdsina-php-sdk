# VDSina PHP SDK

A compact, dependency-free PHP SDK for the [VDSina public API](https://vdsina.com/tech/api)
(`userapi.vdsina.com` / `userapi.vdsina.ru`). It covers the complete public API
surface using only `curl` + `json` extensions and requires **PHP 8.0+**.

## Installation

### Composer

The package is not published on Packagist yet. Register the Git repository
first, then require the current stable tag:

```bash
composer config repositories.vdsina-php-sdk vcs https://github.com/alexxxst/vdsina-php-sdk
composer require vdsina/php-sdk:^1.2
```

The same can be done by adding this to your `composer.json`:

```json
{
    "repositories": [
        { "type": "vcs", "url": "https://github.com/alexxxst/vdsina-php-sdk" }
    ],
    "require": {
        "vdsina/php-sdk": "^1.2"
    }
}
```

Tags are cut on `main` (the latest is `v1.2.0`); `dev-main` always tracks the
development branch. Once the package is published on Packagist, the plain
command works as usual and the VCS registration above is no longer needed:

```bash
composer require vdsina/php-sdk
```

### Manual (no Composer)

Since the SDK has zero third-party dependencies, copy the `src/` directory into
your project and register the `Vdsina\` namespace with any PSR-4 autoloader, for
example:

```json
{
    "autoload": {
        "psr-4": {
            "Vdsina\\": "path/to/src/"
        }
    }
}
```

or plain PHP:

```php
spl_autoload_register(static function (string $class): void {
    $prefix = 'Vdsina\\';
    if (str_starts_with($class, $prefix)) {
        require __DIR__ . '/path/to/src/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
    }
});
```

## Quick start

```php
<?php

require 'vendor/autoload.php';

use Vdsina\Client;
use Vdsina\ApiException;
use Vdsina\Transport\CurlTransport;

// The token is obtained in the control panel (Account information).
$api = new Client(new CurlTransport(), 'your-api-token');

// Optional: configure the transport (all shown with their defaults):
$api = new Client(
    new CurlTransport(
        'userapi.vdsina.com',        // host — a hostname or a full URL (a path in the host is used as the complete base)
        'v1',                        // API version (not appended when the host already contains a path)
        'https',                     // scheme used when the host has none
        30,                          // timeout (seconds)
        Client::DEFAULT_USER_AGENT,  // User-Agent
        []                           // extra cURL options (proxy, SSL flags, ...)
    ),
    'your-api-token'                 // Permanent API token
);

try {
    $account = $api->getAccount();   // returns the 'data' part of the envelope
    echo $account['account']['name'], PHP_EOL;

    foreach ($api->getServers() as $server) {
        echo $server['name'], PHP_EOL;
    }
} catch (ApiException $e) {
    echo 'Error: ', $e->getMessage(), PHP_EOL;
    echo 'HTTP code: ', $e->getStatusCode(), PHP_EOL;
}
```

## Design notes

- **Return value** — every method returns the `data` member of the API
  response envelope (a decoded associative array, or `null` when the endpoint
  returns no payload). The full envelope of the most recent response is
  available via `$api->getLastResponse()` and its HTTP code via
  `$api->getLastHttpCode()`; both are reset to `null` when a request fails at
  the transport level or returns malformed JSON.
- **Errors** — any failure (transport, malformed JSON, API logical error, or
  non-2xx HTTP status) is thrown as `Vdsina\ApiException`, carrying the HTTP
  status code and the parsed `status_msg` / `description` / `data` fields.
  Network/configuration failures are thrown as `Vdsina\Transport\TransportException`,
  which extends `ApiException`, so a single `catch (ApiException)` still works.
- **Field names** — request/response field names match the OpenAPI schema
  exactly, including hyphenated names (`server-plan`, `ssh-key`, `ip-reserve`).
  PHP method arguments use camelCase and are mapped internally.
- **Nothing is hard-coded** — host, API version, scheme, timeout, User-Agent
  and extra cURL options are all configurable via `CurlTransport`.

## Transport

`Client` performs every call through a `Vdsina\Transport\TransportInterface`.
The bundled `CurlTransport` is the default implementation; it owns the host,
API version, scheme, timeout, User-Agent and extra cURL options, and returns a
raw `Vdsina\Transport\Response` (status code + body) without interpreting it.

This makes the client easy to test and to plug into any HTTP stack — implement
the two-method interface and inject it:

```php
use Vdsina\Client;
use Vdsina\Transport\Response;
use Vdsina\Transport\TransportInterface;

$transport = new class implements TransportInterface {
    public function send(string $method, string $url, array $headers = [], ?string $body = null): Response
    {
        // Call any HTTP client you like and map the result to a Response.
        return new Response(200, [], '{"status":"ok","data":{"real":"0","bonus":"0","partner":"0"}}');
    }

    public function baseUrl(): string
    {
        return 'https://userapi.vdsina.com/v1';
    }
};

$api = new Client($transport, 'your-api-token');
```

Compressed responses (`gzip` / `deflate`) are negotiated and decompressed by
`CurlTransport` transparently.

If you need to customize request/response handling itself (rather than just the
HTTP layer), subclass `Client` and override the protected `request()` method.

## Testing

```bash
composer install
composer test    # PHPUnit
composer lint    # php -l over src, tests and examples
```

## Method reference

### Account
| Method | HTTP |
|---|---|
| `getAccount()` | `GET /account` |
| `getBalance()` | `GET /account.balance` |
| `getLimits()` | `GET /account.limit` |
| `register(string $email, string $code)` | `POST /register` |

### Helpers
| Method | HTTP |
|---|---|
| `getServerGroups()` | `GET /server-group` |
| `getDatacenters()` | `GET /datacenter` |
| `getTemplates()` | `GET /template` |
| `getServerPlans(int $groupId)` | `GET /server-plan/{groupID}` |

### SSH keys
| Method | HTTP |
|---|---|
| `getSshKeys()` | `GET /ssh-key` |
| `createSshKey(string $name, string $data)` | `POST /ssh-key` |
| `getSshKey(int $keyId)` | `GET /ssh-key/{keyID}` |
| `updateSshKey(int $keyId, string $name, string $data)` | `PUT /ssh-key/{keyID}` |
| `deleteSshKey(int $keyId)` | `DELETE /ssh-key/{keyID}` |

### ISO
| Method | HTTP |
|---|---|
| `getIsos()` | `GET /iso` |
| `downloadIso(string $url)` | `POST /iso` |
| `getIsoDownloadStatus(string $key)` | `GET /iso/{KEY}` |
| `createIso(string $key)` | `POST /iso/{KEY}` |
| `getIso(int $isoId)` | `GET /iso/{isoID}` |
| `deleteIso(int $isoId)` | `DELETE /iso/{isoID}` |

### Server
| Method | HTTP |
|---|---|
| `getServers()` | `GET /server` |
| `createServer(int $datacenter, int $serverPlan, ...)` | `POST /server` |
| `getServer(int $serverId)` | `GET /server/{serverID}` |
| `updateServer(int $serverId, string $name, ...)` | `PUT /server/{serverID}` |
| `deleteServer(int $serverId)` | `DELETE /server/{serverID}` |
| `rebootServer(int $serverId, ?string $type = null)` | `PUT /server.reboot/{serverID}` |
| `reinstallServer(int $serverId, ?int $template = null, ...)` | `PUT /server.reinstall/{serverID}` |
| `getServerPassword(int $serverId)` | `GET /server.password/{serverID}` |
| `setServerPassword(int $serverId, string $password)` | `PUT /server.password/{serverID}` |
| `changeServerPlan(int $serverId, int $serverPlan, ...)` | `PUT /server.plan/{serverID}` |
| `prolongServer(int $serverId)` | `PUT /server.prolong/{serverID}` |
| `attachServerIso(int $serverId, int $iso)` | `PUT /server.iso/{serverID}` |
| `detachServerIso(int $serverId)` | `DELETE /server.iso/{serverID}` |
| `getServerStats(int $serverId, ?string $from = null, ?string $to = null)` | `GET /server.stat/{serverID}` |

### Backup
| Method | HTTP |
|---|---|
| `getBackups()` | `GET /backup` |
| `getBackup(int $backupId)` | `GET /backup/{backupID}` |
| `updateBackup(int $backupId, string $name, ?string $autoprolong = null)` | `PUT /backup/{backupID}` |
| `deleteBackup(int $backupId)` | `DELETE /backup/{backupID}` |
| `createBackup(int $serviceId)` | `POST /backup/{serviceID}` |
| `restoreBackup(int $backupId, int $service)` | `PUT /backup.restore/{backupID}` |
| `copyBackup(int $backupId, int $datacenter)` | `POST /backup.copy/{backupID}` |

### Backup schedules
| Method | HTTP |
|---|---|
| `getBackupSchedule(int $serviceId)` | `GET /backup.schedule/{serviceID}` |
| `createBackupSchedule(int $serviceId, array $schedule)` | `POST /backup.schedule/{serviceID}` |
| `deleteBackupSchedule(int $serviceId, ?string $type = null)` | `DELETE /backup.schedule/{serviceID}` |

### Local IP address
| Method | HTTP |
|---|---|
| `getServerLocalIp(int $serverId)` | `GET /server.ip.local/{serverID}` |
| `createServerLocalIp(int $serverId)` | `POST /server.ip.local/{serverID}` |
| `deleteServerLocalIp(int $serverId)` | `DELETE /server.ip.local/{serverID}` |

### IP address pool
| Method | HTTP |
|---|---|
| `getIps()` | `GET /ip` |
| `getIp(int $ipId)` | `GET /ip/{ipID}` |

### PTR records for IP
| Method | HTTP |
|---|---|
| `getIpPtrRecords(int $ipId)` | `GET /ip.ptr/{ipID}` |
| `createIpPtrRecord(int $ipId, string $ip, string $host)` | `POST /ip.ptr/{ipID}` |
| `updateIpPtrRecord(int $ptrId, string $host)` | `PUT /ip.ptr/{ptrID}` |
| `deleteIpPtrRecord(int $ptrId)` | `DELETE /ip.ptr/{ptrID}` |

### Reserved IP address
| Method | HTTP |
|---|---|
| `getReservedIpServices()` | `GET /ip-reserve` |
| `getReservedIpService(int $serviceId)` | `GET /ip-reserve/{serviceID}` |
| `deleteReservedIpService(int $serviceId)` | `DELETE /ip-reserve/{serviceID}` |

### Additional IP addresses
| Method | HTTP |
|---|---|
| `getAdditionalIpServices()` | `GET /server-ip` |
| `getServerIps(int $serverId)` | `GET /server.ip/{serverID}` |
| `orderServerIps(int $serverId, string $type, int $count)` | `POST /server.ip/{serverID}` |
| `deleteServerIps(int $serverId, string $type, array $delete)` | `PUT /server.ip/{serverID}` |
| `getAdditionalIpService(int $serviceId)` | `GET /server-ip/{serviceID}` |
| `deleteAdditionalIpServiceAddresses(int $serviceId, array $delete)` | `PUT /server-ip/{serviceID}` |
| `deleteAdditionalIpService(int $serviceId)` | `DELETE /server-ip/{serviceID}` |

### DNS
| Method | HTTP |
|---|---|
| `getDnsServices()` | `GET /dns` |
| `createDnsService(string $name, ?string $ip = null)` | `POST /dns` |
| `getDnsService(int $serviceId)` | `GET /dns/{serviceID}` |
| `deleteDnsService(int $serviceId)` | `DELETE /dns/{serviceID}` |
| `getDnsRecords(int $serviceId)` | `GET /dns.record/{serviceID}` |
| `createDnsRecord(int $serviceId, string $host, string $type, string $value, ...)` | `POST /dns.record/{serviceID}` |
| `updateDnsRecord(int $recordId, string $value, ...)` | `PUT /dns.record/{recordID}` |
| `deleteDnsRecord(int $recordId)` | `DELETE /dns.record/{recordID}` |

### Billing
| Method | HTTP |
|---|---|
| `getOperations(?string $from = null, ?string $to = null)` | `GET /operation` |
| `createOperation(float $summ)` | `POST /operation` |
| `getOperation(int $operationId)` | `GET /operation/{operationID}` |
| `deleteOperation(int $operationId)` | `DELETE /operation/{operationID}` |

> The deprecated `POST /auth` endpoint (user authentication / token obtain) has
> been intentionally omitted, as it has been removed from the production
> environment.

## Examples

See the [`examples/`](examples/) directory for runnable, copy-paste ready
snippets:

- [`account.php`](examples/account.php) — account, balance, limits and helpers.
- [`server.php`](examples/server.php) — create, inspect and manage servers.
- [`dns.php`](examples/dns.php) — DNS services and records.

Make sure the autoloader exists first (`composer install`), then run any
example with your API token:

```bash
composer install
php examples/account.php <API_TOKEN>
```

## License

MIT — see [LICENSE](LICENSE).
