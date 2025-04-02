# # IPservice

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Service ID | [optional]
**name** | **string** | Service name | [optional]
**full_name** | **string** | Service full name | [optional]
**created** | **\DateTime** | Service create date | [optional]
**updated** | **\DateTime** | Service update date | [optional]
**end** | **\DateTime** | Service end date | [optional]
**status** | [**\OpenAPI\Client\Model\ServiceStatus**](ServiceStatus.md) |  | [optional]
**status_text** | **string** | Service status description | [optional]
**ip** | [**\OpenAPI\Client\Model\IPserviceIpInner[]**](IPserviceIpInner.md) |  | [optional]
**server** | [**\OpenAPI\Client\Model\IPserviceServer**](IPserviceServer.md) |  | [optional]
**datacenter** | [**\OpenAPI\Client\Model\Datacenter**](Datacenter.md) |  | [optional]
**can** | [**\OpenAPI\Client\Model\ISOCan**](ISOCan.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
