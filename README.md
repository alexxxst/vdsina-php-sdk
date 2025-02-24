# VDSina-PHP-SDK OpenAPI client

The data format of the incoming request and the returned data: JSON.
All dates and timestamps are returned in the Europe/Moscow zone (the time zone in which the API server is located).
A permanent authorization token can be obtained in the personal account in viewing the user's account information. The token changes when the user's password is changed.
The token will have the same access rights as the specified user on whose behalf the token request was made. If you need to restrict actions for API requests, you need to create a separate user in the account with the necessary set of rights and make requests with this user's token.



## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

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

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->accountBalanceGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->accountBalanceGet: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://userapi.vdsina.com/v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AccountApi* | [**accountBalanceGet**](docs/Api/AccountApi.md#accountbalanceget) | **GET** /account.balance | Account balance
*AccountApi* | [**accountGet**](docs/Api/AccountApi.md#accountget) | **GET** /account | Account information and shutdown forecast
*AccountApi* | [**accountLimitGet**](docs/Api/AccountApi.md#accountlimitget) | **GET** /account.limit | Account limits
*AccountApi* | [**authPost**](docs/Api/AccountApi.md#authpost) | **POST** /auth | User authentication and token obtain
*AccountApi* | [**registerPost**](docs/Api/AccountApi.md#registerpost) | **POST** /register | Registration of a new account
*BackupApi* | [**backupBackupIDDelete**](docs/Api/BackupApi.md#backupbackupiddelete) | **DELETE** /backup/{backupID} | Delete backup
*BackupApi* | [**backupBackupIDGet**](docs/Api/BackupApi.md#backupbackupidget) | **GET** /backup/{backupID} | View backup information
*BackupApi* | [**backupBackupIDPut**](docs/Api/BackupApi.md#backupbackupidput) | **PUT** /backup/{backupID} | Update backup information
*BackupApi* | [**backupCopyBackupIDPost**](docs/Api/BackupApi.md#backupcopybackupidpost) | **POST** /backup.copy/{backupID} | Copy backup to another datacenter
*BackupApi* | [**backupGet**](docs/Api/BackupApi.md#backupget) | **GET** /backup | Backups list
*BackupApi* | [**backupRestoreBackupIDPost**](docs/Api/BackupApi.md#backuprestorebackupidpost) | **POST** /backup.restore/{backupID} | Restore backup to service
*BackupApi* | [**backupServiceIDPost**](docs/Api/BackupApi.md#backupserviceidpost) | **POST** /backup/{serviceID} | Create new backup of service
*BackupSchedulesApi* | [**backupScheduleServiceIDDelete**](docs/Api/BackupSchedulesApi.md#backupscheduleserviceiddelete) | **DELETE** /backup.schedule/{serviceID} | Delete backup schedule
*BackupSchedulesApi* | [**backupScheduleServiceIDGet**](docs/Api/BackupSchedulesApi.md#backupscheduleserviceidget) | **GET** /backup.schedule/{serviceID} | Backup schedule list
*BackupSchedulesApi* | [**backupScheduleServiceIDPost**](docs/Api/BackupSchedulesApi.md#backupscheduleserviceidpost) | **POST** /backup.schedule/{serviceID} | Create backup schedule
*BillingApi* | [**operationGet**](docs/Api/BillingApi.md#operationget) | **GET** /operation | Operations list
*BillingApi* | [**operationOperationIDDelete**](docs/Api/BillingApi.md#operationoperationiddelete) | **DELETE** /operation/{operationID} | Delete unpaid replenishment operation
*BillingApi* | [**operationOperationIDGet**](docs/Api/BillingApi.md#operationoperationidget) | **GET** /operation/{operationID} | View operation
*BillingApi* | [**operationPost**](docs/Api/BillingApi.md#operationpost) | **POST** /operation | Create balance replenishment
*DNSApi* | [**dnsGet**](docs/Api/DNSApi.md#dnsget) | **GET** /dns | All services list with DNS
*DNSApi* | [**dnsPost**](docs/Api/DNSApi.md#dnspost) | **POST** /dns | Create DNS service
*DNSApi* | [**dnsRecordRecordIDDelete**](docs/Api/DNSApi.md#dnsrecordrecordiddelete) | **DELETE** /dns.record/{recordID} | Delete DNS record
*DNSApi* | [**dnsRecordRecordIDPut**](docs/Api/DNSApi.md#dnsrecordrecordidput) | **PUT** /dns.record/{recordID} | Update DNS record
*DNSApi* | [**dnsRecordServiceIDGet**](docs/Api/DNSApi.md#dnsrecordserviceidget) | **GET** /dns.record/{serviceID} | View DNS records of DNS service
*DNSApi* | [**dnsRecordServiceIDPost**](docs/Api/DNSApi.md#dnsrecordserviceidpost) | **POST** /dns.record/{serviceID} | Create DNS record for DNS service
*DNSApi* | [**dnsServiceIDDelete**](docs/Api/DNSApi.md#dnsserviceiddelete) | **DELETE** /dns/{serviceID} | Delete DNS service
*DNSApi* | [**dnsServiceIDGet**](docs/Api/DNSApi.md#dnsserviceidget) | **GET** /dns/{serviceID} | View DNS service data
*HelpersApi* | [**datacenterGet**](docs/Api/HelpersApi.md#datacenterget) | **GET** /datacenter | List of datacenters
*HelpersApi* | [**serverGroupGet**](docs/Api/HelpersApi.md#servergroupget) | **GET** /server-group | List of tariff plan groups
*HelpersApi* | [**serverPlanGroupIDGet**](docs/Api/HelpersApi.md#serverplangroupidget) | **GET** /server-plan/{groupID} | List of tariff plans for servers
*HelpersApi* | [**templateGet**](docs/Api/HelpersApi.md#templateget) | **GET** /template | List of OS templates
*IPAddressApi* | [**ipGet**](docs/Api/IPAddressApi.md#ipget) | **GET** /ip | IP pool
*IPAddressApi* | [**ipIpIDGet**](docs/Api/IPAddressApi.md#ipipidget) | **GET** /ip/{ipID} | IP information
*IPAddressApi* | [**serverIpGet**](docs/Api/IPAddressApi.md#serveripget) | **GET** /server-ip | All services list with additional IP addresses
*IPAddressApi* | [**serverIpServerIDGet**](docs/Api/IPAddressApi.md#serveripserveridget) | **GET** /server.ip/{serverID} | Services list with additional IP addresses
*IPAddressApi* | [**serverIpServerIDPost**](docs/Api/IPAddressApi.md#serveripserveridpost) | **POST** /server.ip/{serverID} | Order additional IP addresses for server
*IPAddressApi* | [**serverIpServerIDPut**](docs/Api/IPAddressApi.md#serveripserveridput) | **PUT** /server.ip/{serverID} | Delete additional IP addresses for server
*IPAddressApi* | [**serverIpServiceIDDelete**](docs/Api/IPAddressApi.md#serveripserviceiddelete) | **DELETE** /server-ip/{serviceID} | Delete additional IP service
*IPAddressApi* | [**serverIpServiceIDPut**](docs/Api/IPAddressApi.md#serveripserviceidput) | **PUT** /server-ip/{serviceID} | Delete additional IP addresses for service
*ISOApi* | [**isoGet**](docs/Api/ISOApi.md#isoget) | **GET** /iso | Get ISO list
*ISOApi* | [**isoIsoIDDelete**](docs/Api/ISOApi.md#isoisoiddelete) | **DELETE** /iso/{isoID} | Delete ISO service
*ISOApi* | [**isoIsoIDGet**](docs/Api/ISOApi.md#isoisoidget) | **GET** /iso/{isoID} | View ISO
*ISOApi* | [**isoKEYGet**](docs/Api/ISOApi.md#isokeyget) | **GET** /iso/{KEY} | Check ISO download status
*ISOApi* | [**isoKEYPost**](docs/Api/ISOApi.md#isokeypost) | **POST** /iso/{KEY} | Create new ISO service
*ISOApi* | [**isoPost**](docs/Api/ISOApi.md#isopost) | **POST** /iso | Download ISO
*ISOApi* | [**serverIsoServerIDDelete**](docs/Api/ISOApi.md#serverisoserveriddelete) | **DELETE** /server.iso/{serverID} | Detach ISO from server
*ISOApi* | [**serverIsoServerIDPut**](docs/Api/ISOApi.md#serverisoserveridput) | **PUT** /server.iso/{serverID} | Attach ISO to server
*LocalIPAddressApi* | [**serverIpLocalServerIDDelete**](docs/Api/LocalIPAddressApi.md#serveriplocalserveriddelete) | **DELETE** /server.ip.local/{serverID} | Delete server local IP address
*LocalIPAddressApi* | [**serverIpLocalServerIDGet**](docs/Api/LocalIPAddressApi.md#serveriplocalserveridget) | **GET** /server.ip.local/{serverID} | View info about server local IP address
*LocalIPAddressApi* | [**serverIpLocalServerIDPost**](docs/Api/LocalIPAddressApi.md#serveriplocalserveridpost) | **POST** /server.ip.local/{serverID} | Create server local IP address
*SSHKeyApi* | [**sshKeyGet**](docs/Api/SSHKeyApi.md#sshkeyget) | **GET** /ssh-key | Get SSH keys list
*SSHKeyApi* | [**sshKeyKeyIDDelete**](docs/Api/SSHKeyApi.md#sshkeykeyiddelete) | **DELETE** /ssh-key/{keyID} | Delete SSH key
*SSHKeyApi* | [**sshKeyKeyIDGet**](docs/Api/SSHKeyApi.md#sshkeykeyidget) | **GET** /ssh-key/{keyID} | View one SSH key
*SSHKeyApi* | [**sshKeyKeyIDPut**](docs/Api/SSHKeyApi.md#sshkeykeyidput) | **PUT** /ssh-key/{keyID} | Update SSH key
*SSHKeyApi* | [**sshKeyPost**](docs/Api/SSHKeyApi.md#sshkeypost) | **POST** /ssh-key | Create new SSH key
*ServerApi* | [**serverGet**](docs/Api/ServerApi.md#serverget) | **GET** /server | Servers list
*ServerApi* | [**serverIpLocalServerIDDelete**](docs/Api/ServerApi.md#serveriplocalserveriddelete) | **DELETE** /server.ip.local/{serverID} | Delete server local IP address
*ServerApi* | [**serverIpLocalServerIDGet**](docs/Api/ServerApi.md#serveriplocalserveridget) | **GET** /server.ip.local/{serverID} | View info about server local IP address
*ServerApi* | [**serverIpLocalServerIDPost**](docs/Api/ServerApi.md#serveriplocalserveridpost) | **POST** /server.ip.local/{serverID} | Create server local IP address
*ServerApi* | [**serverIpServerIDGet**](docs/Api/ServerApi.md#serveripserveridget) | **GET** /server.ip/{serverID} | Services list with additional IP addresses
*ServerApi* | [**serverIpServerIDPost**](docs/Api/ServerApi.md#serveripserveridpost) | **POST** /server.ip/{serverID} | Order additional IP addresses for server
*ServerApi* | [**serverIpServerIDPut**](docs/Api/ServerApi.md#serveripserveridput) | **PUT** /server.ip/{serverID} | Delete additional IP addresses for server
*ServerApi* | [**serverIsoServerIDDelete**](docs/Api/ServerApi.md#serverisoserveriddelete) | **DELETE** /server.iso/{serverID} | Detach ISO from server
*ServerApi* | [**serverIsoServerIDPut**](docs/Api/ServerApi.md#serverisoserveridput) | **PUT** /server.iso/{serverID} | Attach ISO to server
*ServerApi* | [**serverPasswordServerIDGet**](docs/Api/ServerApi.md#serverpasswordserveridget) | **GET** /server.password/{serverID} | Get server password
*ServerApi* | [**serverPasswordServerIDPut**](docs/Api/ServerApi.md#serverpasswordserveridput) | **PUT** /server.password/{serverID} | Set server password
*ServerApi* | [**serverPlanServerIDPut**](docs/Api/ServerApi.md#serverplanserveridput) | **PUT** /server.plan/{serverID} | Change server tariff plan
*ServerApi* | [**serverPost**](docs/Api/ServerApi.md#serverpost) | **POST** /server | Create new server
*ServerApi* | [**serverProlongServerIDPut**](docs/Api/ServerApi.md#serverprolongserveridput) | **PUT** /server.prolong/{serverID} | Prolong and start server
*ServerApi* | [**serverRebootServerIDPut**](docs/Api/ServerApi.md#serverrebootserveridput) | **PUT** /server.reboot/{serverID} | Server reboot
*ServerApi* | [**serverReinstallServerIDPut**](docs/Api/ServerApi.md#serverreinstallserveridput) | **PUT** /server.reinstall/{serverID} | Reinstalling the server
*ServerApi* | [**serverServerIDDelete**](docs/Api/ServerApi.md#serverserveriddelete) | **DELETE** /server/{serverID} | Delete server
*ServerApi* | [**serverServerIDGet**](docs/Api/ServerApi.md#serverserveridget) | **GET** /server/{serverID} | View server info
*ServerApi* | [**serverServerIDPut**](docs/Api/ServerApi.md#serverserveridput) | **PUT** /server/{serverID} | Update server parameters
*ServerApi* | [**serverStatServerIDGet**](docs/Api/ServerApi.md#serverstatserveridget) | **GET** /server.stat/{serverID} | Server statistics

## Models

- [400Data](docs/Model/400Data.md)
- [AccountBalanceGet200Response](docs/Model/AccountBalanceGet200Response.md)
- [AccountBalanceGet200ResponseData](docs/Model/AccountBalanceGet200ResponseData.md)
- [AccountGet200Response](docs/Model/AccountGet200Response.md)
- [AccountGet200ResponseData](docs/Model/AccountGet200ResponseData.md)
- [AccountGet200ResponseDataAccount](docs/Model/AccountGet200ResponseDataAccount.md)
- [AccountGet200ResponseDataCan](docs/Model/AccountGet200ResponseDataCan.md)
- [AccountGet4XXResponse](docs/Model/AccountGet4XXResponse.md)
- [AccountGet5XXResponse](docs/Model/AccountGet5XXResponse.md)
- [AccountLimitGet200Response](docs/Model/AccountLimitGet200Response.md)
- [AccountLimitGet200ResponseData](docs/Model/AccountLimitGet200ResponseData.md)
- [AccountLimitGet200ResponseDataServer](docs/Model/AccountLimitGet200ResponseDataServer.md)
- [AccountLimitGet200ResponseDataServerIp4](docs/Model/AccountLimitGet200ResponseDataServerIp4.md)
- [AuthPost200Response](docs/Model/AuthPost200Response.md)
- [AuthPost200ResponseData](docs/Model/AuthPost200ResponseData.md)
- [AuthPostRequest](docs/Model/AuthPostRequest.md)
- [Backup](docs/Model/Backup.md)
- [BackupBackupIDDelete200Response](docs/Model/BackupBackupIDDelete200Response.md)
- [BackupBackupIDGet200Response](docs/Model/BackupBackupIDGet200Response.md)
- [BackupBackupIDPut200Response](docs/Model/BackupBackupIDPut200Response.md)
- [BackupBackupIDPutRequest](docs/Model/BackupBackupIDPutRequest.md)
- [BackupCan](docs/Model/BackupCan.md)
- [BackupCopyBackupIDPost202Response](docs/Model/BackupCopyBackupIDPost202Response.md)
- [BackupCopyBackupIDPost202ResponseData](docs/Model/BackupCopyBackupIDPost202ResponseData.md)
- [BackupCopyBackupIDPostRequest](docs/Model/BackupCopyBackupIDPostRequest.md)
- [BackupGet200Response](docs/Model/BackupGet200Response.md)
- [BackupRestoreBackupIDPost200Response](docs/Model/BackupRestoreBackupIDPost200Response.md)
- [BackupRestoreBackupIDPostRequest](docs/Model/BackupRestoreBackupIDPostRequest.md)
- [BackupScheduleServiceIDDelete200Response](docs/Model/BackupScheduleServiceIDDelete200Response.md)
- [BackupScheduleServiceIDGet200Response](docs/Model/BackupScheduleServiceIDGet200Response.md)
- [BackupScheduleServiceIDGet200ResponseData](docs/Model/BackupScheduleServiceIDGet200ResponseData.md)
- [BackupScheduleServiceIDPost200Response](docs/Model/BackupScheduleServiceIDPost200Response.md)
- [BackupScheduleServiceIDPostRequest](docs/Model/BackupScheduleServiceIDPostRequest.md)
- [BackupServer](docs/Model/BackupServer.md)
- [BackupServiceIDPost202Response](docs/Model/BackupServiceIDPost202Response.md)
- [DNS](docs/Model/DNS.md)
- [Datacenter](docs/Model/Datacenter.md)
- [DatacenterGet200Response](docs/Model/DatacenterGet200Response.md)
- [DatacenterGet200ResponseDataInner](docs/Model/DatacenterGet200ResponseDataInner.md)
- [DnsGet200Response](docs/Model/DnsGet200Response.md)
- [DnsPost202Response](docs/Model/DnsPost202Response.md)
- [DnsPost202ResponseData](docs/Model/DnsPost202ResponseData.md)
- [DnsPostRequest](docs/Model/DnsPostRequest.md)
- [DnsRecordRecordIDDelete200Response](docs/Model/DnsRecordRecordIDDelete200Response.md)
- [DnsRecordRecordIDPut200Response](docs/Model/DnsRecordRecordIDPut200Response.md)
- [DnsRecordRecordIDPutRequest](docs/Model/DnsRecordRecordIDPutRequest.md)
- [DnsRecordServiceIDGet200Response](docs/Model/DnsRecordServiceIDGet200Response.md)
- [DnsRecordServiceIDGet200ResponseData](docs/Model/DnsRecordServiceIDGet200ResponseData.md)
- [DnsRecordServiceIDGet200ResponseDataCan](docs/Model/DnsRecordServiceIDGet200ResponseDataCan.md)
- [DnsRecordServiceIDPost200Response](docs/Model/DnsRecordServiceIDPost200Response.md)
- [DnsRecordServiceIDPost200ResponseData](docs/Model/DnsRecordServiceIDPost200ResponseData.md)
- [DnsRecordServiceIDPostRequest](docs/Model/DnsRecordServiceIDPostRequest.md)
- [DnsServiceIDDelete200Response](docs/Model/DnsServiceIDDelete200Response.md)
- [DnsServiceIDGet200Response](docs/Model/DnsServiceIDGet200Response.md)
- [Generic](docs/Model/Generic.md)
- [GenericData](docs/Model/GenericData.md)
- [IPservice](docs/Model/IPservice.md)
- [IPserviceServer](docs/Model/IPserviceServer.md)
- [IPv4p](docs/Model/IPv4p.md)
- [IPv4pService](docs/Model/IPv4pService.md)
- [IPv4s](docs/Model/IPv4s.md)
- [IPv6p](docs/Model/IPv6p.md)
- [IPv6pService](docs/Model/IPv6pService.md)
- [IPv6s](docs/Model/IPv6s.md)
- [ISO](docs/Model/ISO.md)
- [ISOCan](docs/Model/ISOCan.md)
- [ISOFile](docs/Model/ISOFile.md)
- [ISOServer](docs/Model/ISOServer.md)
- [IpGet200Response](docs/Model/IpGet200Response.md)
- [IpGet200ResponseDataInner](docs/Model/IpGet200ResponseDataInner.md)
- [IpIpIDGet200Response](docs/Model/IpIpIDGet200Response.md)
- [IpIpIDGet200ResponseData](docs/Model/IpIpIDGet200ResponseData.md)
- [IsoGet200Response](docs/Model/IsoGet200Response.md)
- [IsoIsoIDDelete200Response](docs/Model/IsoIsoIDDelete200Response.md)
- [IsoIsoIDGet200Response](docs/Model/IsoIsoIDGet200Response.md)
- [IsoKEYGet200Response](docs/Model/IsoKEYGet200Response.md)
- [IsoKEYGet200ResponseData](docs/Model/IsoKEYGet200ResponseData.md)
- [IsoKEYPost202Response](docs/Model/IsoKEYPost202Response.md)
- [IsoKEYPost202ResponseData](docs/Model/IsoKEYPost202ResponseData.md)
- [IsoPost202Response](docs/Model/IsoPost202Response.md)
- [IsoPost202ResponseData](docs/Model/IsoPost202ResponseData.md)
- [IsoPostRequest](docs/Model/IsoPostRequest.md)
- [Model400](docs/Model/Model400.md)
- [Model401](docs/Model/Model401.md)
- [Model403](docs/Model/Model403.md)
- [Model404](docs/Model/Model404.md)
- [Model405](docs/Model/Model405.md)
- [Model500](docs/Model/Model500.md)
- [Model501](docs/Model/Model501.md)
- [Operation](docs/Model/Operation.md)
- [OperationGet200Response](docs/Model/OperationGet200Response.md)
- [OperationOperationIDDelete200Response](docs/Model/OperationOperationIDDelete200Response.md)
- [OperationOperationIDGet200Response](docs/Model/OperationOperationIDGet200Response.md)
- [OperationPayment](docs/Model/OperationPayment.md)
- [OperationPost200Response](docs/Model/OperationPost200Response.md)
- [OperationPost200ResponseData](docs/Model/OperationPost200ResponseData.md)
- [OperationPostRequest](docs/Model/OperationPostRequest.md)
- [OperationService](docs/Model/OperationService.md)
- [RegisterPost200Response](docs/Model/RegisterPost200Response.md)
- [RegisterPost200ResponseData](docs/Model/RegisterPost200ResponseData.md)
- [RegisterPost200ResponseDataAccount](docs/Model/RegisterPost200ResponseDataAccount.md)
- [RegisterPost200ResponseDataUser](docs/Model/RegisterPost200ResponseDataUser.md)
- [RegisterPostRequest](docs/Model/RegisterPostRequest.md)
- [ScheduleDay](docs/Model/ScheduleDay.md)
- [ScheduleMonth](docs/Model/ScheduleMonth.md)
- [ScheduleWeek](docs/Model/ScheduleWeek.md)
- [ServerGet200Response](docs/Model/ServerGet200Response.md)
- [ServerGet200ResponseDataInner](docs/Model/ServerGet200ResponseDataInner.md)
- [ServerGet200ResponseDataInnerCan](docs/Model/ServerGet200ResponseDataInnerCan.md)
- [ServerGet200ResponseDataInnerIp](docs/Model/ServerGet200ResponseDataInnerIp.md)
- [ServerGet200ResponseDataInnerServerPlan](docs/Model/ServerGet200ResponseDataInnerServerPlan.md)
- [ServerGet200ResponseDataInnerTemplate](docs/Model/ServerGet200ResponseDataInnerTemplate.md)
- [ServerGroupGet200Response](docs/Model/ServerGroupGet200Response.md)
- [ServerGroupGet200ResponseDataInner](docs/Model/ServerGroupGet200ResponseDataInner.md)
- [ServerIpGet200Response](docs/Model/ServerIpGet200Response.md)
- [ServerIpLocalServerIDDelete200Response](docs/Model/ServerIpLocalServerIDDelete200Response.md)
- [ServerIpLocalServerIDGet200Response](docs/Model/ServerIpLocalServerIDGet200Response.md)
- [ServerIpLocalServerIDGet200ResponseData](docs/Model/ServerIpLocalServerIDGet200ResponseData.md)
- [ServerIpLocalServerIDPost200Response](docs/Model/ServerIpLocalServerIDPost200Response.md)
- [ServerIpServerIDGet200Response](docs/Model/ServerIpServerIDGet200Response.md)
- [ServerIpServerIDPost200Response](docs/Model/ServerIpServerIDPost200Response.md)
- [ServerIpServerIDPostRequest](docs/Model/ServerIpServerIDPostRequest.md)
- [ServerIpServerIDPut200Response](docs/Model/ServerIpServerIDPut200Response.md)
- [ServerIpServerIDPutRequest](docs/Model/ServerIpServerIDPutRequest.md)
- [ServerIpServiceIDDelete200Response](docs/Model/ServerIpServiceIDDelete200Response.md)
- [ServerIpServiceIDPut200Response](docs/Model/ServerIpServiceIDPut200Response.md)
- [ServerIpServiceIDPutRequest](docs/Model/ServerIpServiceIDPutRequest.md)
- [ServerIsoServerIDDelete200Response](docs/Model/ServerIsoServerIDDelete200Response.md)
- [ServerIsoServerIDPut200Response](docs/Model/ServerIsoServerIDPut200Response.md)
- [ServerIsoServerIDPutRequest](docs/Model/ServerIsoServerIDPutRequest.md)
- [ServerPasswordServerIDGet200Response](docs/Model/ServerPasswordServerIDGet200Response.md)
- [ServerPasswordServerIDGet200ResponseData](docs/Model/ServerPasswordServerIDGet200ResponseData.md)
- [ServerPasswordServerIDPut200Response](docs/Model/ServerPasswordServerIDPut200Response.md)
- [ServerPasswordServerIDPutRequest](docs/Model/ServerPasswordServerIDPutRequest.md)
- [ServerPlanGroupIDGet200Response](docs/Model/ServerPlanGroupIDGet200Response.md)
- [ServerPlanGroupIDGet200ResponseDataInner](docs/Model/ServerPlanGroupIDGet200ResponseDataInner.md)
- [ServerPlanGroupIDGet200ResponseDataInnerBackup](docs/Model/ServerPlanGroupIDGet200ResponseDataInnerBackup.md)
- [ServerPlanGroupIDGet200ResponseDataInnerParams](docs/Model/ServerPlanGroupIDGet200ResponseDataInnerParams.md)
- [ServerPlanGroupIDGet200ResponseDataInnerParamsCpu](docs/Model/ServerPlanGroupIDGet200ResponseDataInnerParamsCpu.md)
- [ServerPlanGroupIDGet200ResponseDataInnerParamsDisk](docs/Model/ServerPlanGroupIDGet200ResponseDataInnerParamsDisk.md)
- [ServerPlanGroupIDGet200ResponseDataInnerParamsIp4](docs/Model/ServerPlanGroupIDGet200ResponseDataInnerParamsIp4.md)
- [ServerPlanGroupIDGet200ResponseDataInnerParamsRam](docs/Model/ServerPlanGroupIDGet200ResponseDataInnerParamsRam.md)
- [ServerPlanServerIDPut200Response](docs/Model/ServerPlanServerIDPut200Response.md)
- [ServerPlanServerIDPutRequest](docs/Model/ServerPlanServerIDPutRequest.md)
- [ServerPost202Response](docs/Model/ServerPost202Response.md)
- [ServerPost202ResponseData](docs/Model/ServerPost202ResponseData.md)
- [ServerPostRequest](docs/Model/ServerPostRequest.md)
- [ServerProlongServerIDPut200Response](docs/Model/ServerProlongServerIDPut200Response.md)
- [ServerRebootServerIDPut200Response](docs/Model/ServerRebootServerIDPut200Response.md)
- [ServerRebootServerIDPutRequest](docs/Model/ServerRebootServerIDPutRequest.md)
- [ServerReinstallServerIDPut200Response](docs/Model/ServerReinstallServerIDPut200Response.md)
- [ServerReinstallServerIDPutRequest](docs/Model/ServerReinstallServerIDPutRequest.md)
- [ServerServerIDDelete200Response](docs/Model/ServerServerIDDelete200Response.md)
- [ServerServerIDGet200Response](docs/Model/ServerServerIDGet200Response.md)
- [ServerServerIDGet200ResponseData](docs/Model/ServerServerIDGet200ResponseData.md)
- [ServerServerIDGet200ResponseDataBandwidth](docs/Model/ServerServerIDGet200ResponseDataBandwidth.md)
- [ServerServerIDGet200ResponseDataCan](docs/Model/ServerServerIDGet200ResponseDataCan.md)
- [ServerServerIDGet200ResponseDataIpInner](docs/Model/ServerServerIDGet200ResponseDataIpInner.md)
- [ServerServerIDGet200ResponseDataIpLocal](docs/Model/ServerServerIDGet200ResponseDataIpLocal.md)
- [ServerServerIDGet200ResponseDataSshKey](docs/Model/ServerServerIDGet200ResponseDataSshKey.md)
- [ServerServerIDPut200Response](docs/Model/ServerServerIDPut200Response.md)
- [ServerServerIDPutRequest](docs/Model/ServerServerIDPutRequest.md)
- [ServerStatServerIDGet200Response](docs/Model/ServerStatServerIDGet200Response.md)
- [ServerStatServerIDGet200ResponseDataInner](docs/Model/ServerStatServerIDGet200ResponseDataInner.md)
- [ServerStatServerIDGet200ResponseDataInnerStat](docs/Model/ServerStatServerIDGet200ResponseDataInnerStat.md)
- [ServiceStatus](docs/Model/ServiceStatus.md)
- [SshKeyGet200Response](docs/Model/SshKeyGet200Response.md)
- [SshKeyGet200ResponseDataInner](docs/Model/SshKeyGet200ResponseDataInner.md)
- [SshKeyKeyIDDelete200Response](docs/Model/SshKeyKeyIDDelete200Response.md)
- [SshKeyKeyIDGet200Response](docs/Model/SshKeyKeyIDGet200Response.md)
- [SshKeyKeyIDGet200ResponseData](docs/Model/SshKeyKeyIDGet200ResponseData.md)
- [SshKeyKeyIDPut200Response](docs/Model/SshKeyKeyIDPut200Response.md)
- [SshKeyKeyIDPutRequest](docs/Model/SshKeyKeyIDPutRequest.md)
- [SshKeyPost201Response](docs/Model/SshKeyPost201Response.md)
- [SshKeyPost201ResponseData](docs/Model/SshKeyPost201ResponseData.md)
- [SshKeyPostRequest](docs/Model/SshKeyPostRequest.md)
- [Tariff](docs/Model/Tariff.md)
- [TariffCpu](docs/Model/TariffCpu.md)
- [TariffDisk](docs/Model/TariffDisk.md)
- [TariffRam](docs/Model/TariffRam.md)
- [TariffTraff](docs/Model/TariffTraff.md)
- [TemplateGet200Response](docs/Model/TemplateGet200Response.md)
- [TemplateGet200ResponseDataInner](docs/Model/TemplateGet200ResponseDataInner.md)
- [TemplateGet200ResponseDataInnerLimits](docs/Model/TemplateGet200ResponseDataInnerLimits.md)
- [TemplateGet200ResponseDataInnerLimitsCpu](docs/Model/TemplateGet200ResponseDataInnerLimitsCpu.md)
- [TemplateGet200ResponseDataInnerLimitsDisk](docs/Model/TemplateGet200ResponseDataInnerLimitsDisk.md)
- [TemplateGet200ResponseDataInnerLimitsRam](docs/Model/TemplateGet200ResponseDataInnerLimitsRam.md)

## Authorization

Authentication schemes defined for the API:
### apiKey

- **Type**: Bearer authentication (string)

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

support@vdsina.com

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.1.0`
    - Generator version: `7.11.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
