# # ServerPlanGroupIDGet200ResponseDataInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Plan ID | [optional]
**name** | **string** | Plan name | [optional]
**cost** | **float** | Plan cost with client discounts | [optional]
**full_cost** | **float** | Plan full cost | [optional]
**period** | **string** | Plan billing period | [optional] [default to 'day']
**min_money** | **float** | Minimal balance for order this plan | [optional]
**can_bonus** | **bool** | Can pay with bonuses when order this plan | [optional]
**description** | **string** | Plan description | [optional]
**server_group** | **int** | Tariff plan group ID | [optional]
**active** | **bool** | Plan status | [optional]
**enable** | **bool** | Plan status | [optional]
**data** | [**\OpenAPI\Client\Model\Tariff**](Tariff.md) |  | [optional]
**backup** | [**\OpenAPI\Client\Model\ServerPlanGroupIDGet200ResponseDataInnerBackup**](ServerPlanGroupIDGet200ResponseDataInnerBackup.md) |  | [optional]
**has_params** | **bool** | When true this plan has expandable params | [optional]
**params** | [**\OpenAPI\Client\Model\ServerPlanGroupIDGet200ResponseDataInnerParams**](ServerPlanGroupIDGet200ResponseDataInnerParams.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
