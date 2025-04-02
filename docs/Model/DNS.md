# # DNS

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Domain ID | [optional]
**name** | **string** | Domain name | [optional]
**full_name** | **string** | Service name | [optional]
**created** | **\DateTime** | Service create date | [optional]
**updated** | **\DateTime** | Service update date | [optional]
**end** | **\DateTime** | Service end date | [optional]
**status** | [**\OpenAPI\Client\Model\ServiceStatus**](ServiceStatus.md) |  | [optional]
**status_text** | **string** | Service status description | [optional]
**real** | **bool** | DNS servers correctly set up in domain NS records | [optional]
**can** | [**\OpenAPI\Client\Model\ISOCan**](ISOCan.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
