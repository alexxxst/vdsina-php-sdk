# # ServerPostRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Server name | [optional]
**datacenter** | **int** | Datacenter ID |
**server_plan** | **int** | Tariff plan ID |
**template** | **int** | OS template ID, mutually exclusive parameter with backup | [optional]
**backup** | **int** | ID of the backup service, mutually exclusive parameter with template. The backup must be located in the same data center as the server being created and be no larger than the disk size of the selected tariff plan | [optional]
**schedule** | **string** | 0 or 1, for create automatic backup week schedule for server. First copy will be created the next day after service created | [optional] [default to '1']
**ssh_key** | **int** | SSH key ID for root user in the supported OS, ignored in case of recovery from backup | [optional]
**iso** | **int** | ID of the ISO service, mutually exclusive parameter with template | [optional]
**host** | **string** | Server hostname, must be correct domain name, ignored in case of recovery from backup | [optional]
**cpu** | **int** | Number of virtual CPUs, if tariff plan supports parameter settings | [optional]
**ram** | **int** | Amount of RAM in GBs, if tariff plan supports parameter settings | [optional]
**disk** | **int** | Amount of storage in GBs, if tariff plan supports parameter settings | [optional]
**gpu** | **int** | Number of GPUs, if tariff plan supports parameter settings | [optional]
**ip4** | **string** | 0 or 1, for order IPv4 for server, if tariff plan supports parameter settings | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
