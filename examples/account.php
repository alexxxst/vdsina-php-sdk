<?php

declare(strict_types=1);

/**
 * Example: account information, balances, limits and helper lists.
 *
 * Run: php examples/account.php <API_TOKEN>
 */

require __DIR__ . '/../vendor/autoload.php';

use Vdsina\ApiException;
use Vdsina\Client;

if ($argc < 2) {
    fwrite(STDERR, "Usage: php account.php <API_TOKEN>\n");
    exit(1);
}

$api = new Client($argv[1]);

try {
    // Account information and shutdown forecast.
    $account = $api->getAccount();
    printf("Account: %s (ID %d)\n", $account['account']['name'], $account['account']['id']);
    printf("Created: %s\n", $account['created']);
    printf("Shutdown forecast: %s\n", $account['forecast'] ?? 'n/a');

    // Balances.
    $balance = $api->getBalance();
    printf("Balance: real=%s bonus=%s partner=%s\n",
        $balance['real'] ?? '0',
        $balance['bonus'] ?? '0',
        $balance['partner'] ?? '0'
    );

    // Account limits.
    $limits = $api->getLimits();
    printf("Servers: %d/%d\n", $limits['server']['now'], $limits['server']['max']);

    // Datacenters.
    foreach ($api->getDatacenters() as $dc) {
        printf("Datacenter %d: %s (%s) active=%s\n",
            $dc['id'], $dc['name'], $dc['country'], $dc['active'] ? 'yes' : 'no'
        );
    }

    // Tariff plan groups.
    foreach ($api->getServerGroups() as $group) {
        printf("Group %d: %s active=%s\n", $group['id'], $group['name'], $group['active'] ? 'yes' : 'no');
    }
} catch (ApiException $e) {
    fwrite(STDERR, 'API error: ' . $e->getMessage() . ' (HTTP ' . $e->getStatusCode() . ")\n");
    exit(1);
}
