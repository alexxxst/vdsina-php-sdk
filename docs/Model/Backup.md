# # Backup

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Backup ID | [optional]
**name** | **string** | Backup name | [optional]
**full_name** | **string** | Backup service name | [optional]
**created** | **\DateTime** | Service create date | [optional]
**updated** | **\DateTime** | Service update date | [optional]
**end** | **\DateTime** | Service end date | [optional]
**status** | [**\OpenAPI\Client\Model\ServiceStatus**](ServiceStatus.md) |  | [optional]
**status_text** | **string** | Service status description | [optional]
**datacenter** | [**\OpenAPI\Client\Model\Datacenter**](Datacenter.md) |  | [optional]
**server** | [**\OpenAPI\Client\Model\BackupServer**](BackupServer.md) |  | [optional]
**can** | [**\OpenAPI\Client\Model\BackupCan**](BackupCan.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
