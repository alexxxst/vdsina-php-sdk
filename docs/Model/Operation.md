# # Operation

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Operation ID | [optional]
**purse** | **string** | Operation purse | [optional]
**type** | **int** | Debit or credit | [optional]
**status** | **int** | Paid or not | [optional]
**summ** | **float** | Operation summ | [optional]
**created** | **\DateTime** | Operation create date | [optional]
**updated** | **\DateTime** | Operation update date | [optional]
**comment** | **string** | Operation description | [optional]
**payment** | [**\OpenAPI\Client\Model\OperationPayment**](OperationPayment.md) |  | [optional]
**service** | [**\OpenAPI\Client\Model\OperationService**](OperationService.md) |  | [optional]
**paylink** | **string** | External link for payment | [optional]
**pdf** | **string** | External link for PDF download | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
