# # DnsRecordServiceIDGet200ResponseData

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | DNS record ID | [optional]
**host** | **string** | Name of DNS record, either with a domain postfix, or only a prefix, @ and * are also available in the name, must be the correct domain name in the end | [optional]
**type** | **string** | Record type | [optional]
**priority** | **string** | Positive number, priority/flag of DNS records for supported types (MX, SRV, CAA) | [optional]
**tag** | **string** | The string required parameter for CAA type records | [optional]
**value** | **string** | Value of the DNS record, depending on the type of record, for example, for a record of type A, the value must be the correct IPv4 address | [optional]
**timestamp** | **\DateTime** | Record timestamp | [optional]
**can** | [**\OpenAPI\Client\Model\DnsRecordServiceIDGet200ResponseDataCan**](DnsRecordServiceIDGet200ResponseDataCan.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
