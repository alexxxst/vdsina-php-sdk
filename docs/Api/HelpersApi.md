# OpenAPI\Client\HelpersApi

All URIs are relative to https://userapi.vdsina.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**datacenterGet()**](HelpersApi.md#datacenterGet) | **GET** /datacenter | List of datacenters |
| [**serverGroupGet()**](HelpersApi.md#serverGroupGet) | **GET** /server-group | List of tariff plan groups |
| [**serverPlanGroupIDGet()**](HelpersApi.md#serverPlanGroupIDGet) | **GET** /server-plan/{groupID} | List of tariff plans for servers |
| [**templateGet()**](HelpersApi.md#templateGet) | **GET** /template | List of OS templates |


## `datacenterGet()`

```php
datacenterGet(): \OpenAPI\Client\Model\DatacenterGet200Response
```

List of datacenters

A list of datacenters is returned in data array. The data is an array of objects, the active flag indicates the possibility of ordering a server in a specific datacenter.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\HelpersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->datacenterGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HelpersApi->datacenterGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\DatacenterGet200Response**](../Model/DatacenterGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverGroupGet()`

```php
serverGroupGet(): \OpenAPI\Client\Model\ServerGroupGet200Response
```

List of tariff plan groups

A list of tariff plan groups with a brief description is returned in data array. The received group IDs should be used in the future when requesting information on additional objects.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\HelpersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->serverGroupGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HelpersApi->serverGroupGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\ServerGroupGet200Response**](../Model/ServerGroupGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverPlanGroupIDGet()`

```php
serverPlanGroupIDGet($group_id): \OpenAPI\Client\Model\ServerPlanGroupIDGet200Response
```

List of tariff plans for servers

The list of tariff plans for servers is returned by the ID of tariff plan group. The data is an array of objects, the active and enable flags indicate the possibility of ordering a server with a specific tariff plan. The data object contains brief characteristics of the tariff plan. The cost and period fields contain the price of the tariff for the specified period (usually 1 day). The min_money field indicates how much funds you need to have on the main balance to order the tariff, the can_bonus flag indicates the ability to pay the tariff with funds from the bonus balance. The data object stores the full composition of the tariff plan: cpu – the number of processors/ cores, ram – the amount of RAM in GB, disk – the number of disk space in GB, traff – the amount of traffic included in the tariff plan for 1 calendar month in GB. The has_params parameter stores the attribute of the constructor tariff, in this case additionally, the tariff may have a params object with data on the possible composition the final tariff and the cost of individual parameters of the tariff plan. Total cost such a tariff consists of the cost of the tariff plan itself and the total the cost of all added tariff parameters.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\HelpersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 56; // int | Tariff plan group ID

try {
    $result = $apiInstance->serverPlanGroupIDGet($group_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HelpersApi->serverPlanGroupIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **int**| Tariff plan group ID | |

### Return type

[**\OpenAPI\Client\Model\ServerPlanGroupIDGet200Response**](../Model/ServerPlanGroupIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `templateGet()`

```php
templateGet(): \OpenAPI\Client\Model\TemplateGet200Response
```

List of OS templates

A list of operating system templates available for installing or reinstalling the server. The data is an array of objects, the active flag indicates the possibility of ordering a server with a specific OS template. The ssh-key flag indicates the ability to use authorization using a custom SSH key in a specific template. The server-plan array contains the ID of tariff plans for which the installation of a server with a specific OS template is available. It is also necessary to pay attention to the minimum system requirements of the OS template: the following are specified in the limits object parameters:  minimum number of processors/cores – cpu, minimum number RAM in GB is ram, the minimum amount of space for a disk partition in GB is disk.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\HelpersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->templateGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HelpersApi->templateGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\TemplateGet200Response**](../Model/TemplateGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
