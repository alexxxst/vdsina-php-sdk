<?php

declare(strict_types=1);

/**
 * Example: list, create and manage servers.
 *
 * Run: php examples/server.php <API_TOKEN>
 */

require __DIR__ . '/../vendor/autoload.php';

use Vdsina\ApiException;
use Vdsina\Client;

if ($argc < 2) {
    fwrite(STDERR, "Usage: php server.php <API_TOKEN>\n");
    exit(1);
}

$api = new Client($argv[1]);

try {
    // List servers.
    $servers = $api->getServers();
    printf("You have %d server(s):\n", count($servers ?? []));
    foreach ($servers as $server) {
        printf("  #%d %s [%s]\n", $server['id'], $server['name'], $server['status']);
    }

    // Pick a tariff plan group and a datacenter for a new server.
    $groups = $api->getServerGroups();
    $group = $groups[0]['id'] ?? null;
    $plans = $group !== null ? $api->getServerPlans($group) : [];
    $datacenters = $api->getDatacenters();

    if ($plans === [] || $datacenters === []) {
        fwrite(STDOUT, "No plans/datacenters available; skipping creation.\n");
        exit(0);
    }

    $plan = $plans[0]['id'];
    $datacenter = $datacenters[0]['id'];

    // Create a server (required params first: datacenter, server-plan).
    $created = $api->createServer($datacenter, $plan, name: 'my-php-sdk-server');
    $serverId = $created['id'];
    printf("Created server ID: %d\n", $serverId);

    // Inspect it.
    $info = $api->getServer($serverId);
    printf("Server %s: %s (plan: %s)\n",
        $info['name'],
        $info['status'],
        $info['server-plan']['name'] ?? 'n/a'
    );

    // Reboot (soft) and read statistics for the last month.
    $api->rebootServer($serverId);
    $stats = $api->getServerStats($serverId);
    printf("Statistics blocks: %d\n", count($stats ?? []));
} catch (ApiException $e) {
    fwrite(STDERR, 'API error: ' . $e->getMessage() . ' (HTTP ' . $e->getStatusCode() . ")\n");
    exit(1);
}
