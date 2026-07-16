# VDSina PHP SDK

A compact, lightweight PHP SDK for the [VDSina Public API](https://vdsina.com/tech/api).

The data format of the incoming request and the returned data: JSON. All dates and timestamps are returned in the Europe/Moscow zone (the time zone in which the API server is located). A permanent authorization token can be obtained in the personal account in viewing the user's account information. The token changes when the user's password is changed. The token will have the same access rights as the specified user on whose behalf the token request was made. If you need to restrict actions for API requests, you need to create a separate user in the account with the necessary set of rights and make requests with this user's token.

## Features

- Simple and direct integration.
- Supports custom host and API version.
- Full coverage of all public endpoints.
- Compatible with PHP 8.0+.

## Installation

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/alexxxst/vdsina-php-sdk.git"
    }
  ],
  "require": {
    "alexxxst/vdsina-php-sdk": "*@dev"
  }
}
```

Then run `composer install`

## Usage

### Basic Configuration

```php
require 'vendor/autoload.php';

use vdsina\sdk\Client;

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
