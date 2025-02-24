# # ServerPlanServerIDPutRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**server_plan** | **int** | New tariff plan ID, must be from the same tariff group |
**cpu** | **int** | New CPU count (when constructor tariff) | [optional]
**ram** | **int** | New RAM amount in GB (when constructor tariff) | [optional]
**disk** | **int** | New storage amount in GB, must not be smaller than current amount (when constructor tariff) | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
