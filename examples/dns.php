<?php

declare(strict_types=1);

/**
 * Example: DNS services and records.
 *
 * Run: php examples/dns.php <API_TOKEN>
 */

require __DIR__ . '/../vendor/autoload.php';

use Vdsina\ApiException;
use Vdsina\Client;

if ($argc < 2) {
    fwrite(STDERR, "Usage: php dns.php <API_TOKEN>\n");
    exit(1);
}

$api = new Client($argv[1]);

try {
    // Create a DNS service (domain) and get its ID.
    $created = $api->createDnsService('example.org', '203.0.113.10');
    $serviceId = $created['id'];
    printf("Created DNS service ID: %d\n", $serviceId);

    // Add an A record.
    $record = $api->createDnsRecord($serviceId, 'example.org', 'A', '203.0.113.10');
    $recordId = $record['id'];

    // List all records of the service.
    foreach ($api->getDnsRecords($serviceId) as $r) {
        printf("  [%s] %s -> %s\n", $r['type'], $r['host'], $r['value']);
    }

    // Update the record value.
    $api->updateDnsRecord($recordId, '203.0.113.20');
    printf("Updated record ID: %d\n", $recordId);

    // Cleanup.
    $api->deleteDnsRecord($recordId);
    $api->deleteDnsService($serviceId);
    fwrite(STDOUT, "Cleaned up.\n");
} catch (ApiException $e) {
    fwrite(STDERR, 'API error: ' . $e->getMessage() . ' (HTTP ' . $e->getStatusCode() . ")\n");
    exit(1);
}
