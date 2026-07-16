# VDSina PHP SDK

A compact, lightweight PHP SDK for the [VDSina Public API](https://vdsina.com/tech/api).

## Features

- Simple and direct integration.
- Supports custom host and API version.
- Full coverage of all public endpoints.
- Compatible with PHP 8.0+.

## Installation

```bash
composer require vdsina/php-sdk
```

## Usage

### Basic Configuration

```php
require 'vendor/autoload.php';

use Vdsina\Sdk\Client;

$client = new Client(
    token: 'your_api_token_here',
    host: 'userapi.vdsina.com', // Optional: defaults to userapi.vdsina.com
    version: 'v1' // Optional: defaults to v1
);
```

### Examples

#### Account Info
```php
try {
    $account = $client->getAccount();
    print_r($account);
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

#### Server Management
```php
// List all servers
$servers = $client->listServers();

// Get specific server info
$server = $client->getServer(12345);

// Reboot a server
$result = $client->rebootServer(12345);
```

#### DNS Management
```php
// Create a DNS service
$dns = $client->createDnsService(['name' => 'example.com', 'ip' => '1.2.3.4']);

// Add a record
$client->createDnsRecord($dns['data']['id'], [
    'host' => '@',
    'type' => 'A',
    'value' => '1.2.3.4'
]);
```

#### Billing
```php
// Get balance
$balance = $client->getBalance();

// Replenish balance
$client->createReplenishment(100.50);
```
