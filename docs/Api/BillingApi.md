# OpenAPI\Client\BillingApi

All URIs are relative to https://userapi.vdsina.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**operationGet()**](BillingApi.md#operationGet) | **GET** /operation | Operations list |
| [**operationOperationIDDelete()**](BillingApi.md#operationOperationIDDelete) | **DELETE** /operation/{operationID} | Delete unpaid replenishment operation |
| [**operationOperationIDGet()**](BillingApi.md#operationOperationIDGet) | **GET** /operation/{operationID} | View operation |
| [**operationPost()**](BillingApi.md#operationPost) | **POST** /operation | Create balance replenishment |


## `operationGet()`

```php
operationGet($from, $to): \OpenAPI\Client\Model\OperationGet200Response
```

Operations list

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BillingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Filter date from
$to = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Filter date to

try {
    $result = $apiInstance->operationGet($from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BillingApi->operationGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **from** | **\DateTime**| Filter date from | [optional] |
| **to** | **\DateTime**| Filter date to | [optional] |

### Return type

[**\OpenAPI\Client\Model\OperationGet200Response**](../Model/OperationGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `operationOperationIDDelete()`

```php
operationOperationIDDelete($operation_id): \OpenAPI\Client\Model\OperationOperationIDDelete200Response
```

Delete unpaid replenishment operation

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BillingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$operation_id = 56; // int | Operation ID

try {
    $result = $apiInstance->operationOperationIDDelete($operation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BillingApi->operationOperationIDDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **operation_id** | **int**| Operation ID | |

### Return type

[**\OpenAPI\Client\Model\OperationOperationIDDelete200Response**](../Model/OperationOperationIDDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `operationOperationIDGet()`

```php
operationOperationIDGet($operation_id): \OpenAPI\Client\Model\OperationOperationIDGet200Response
```

View operation

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BillingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$operation_id = 56; // int | Operation ID

try {
    $result = $apiInstance->operationOperationIDGet($operation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BillingApi->operationOperationIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **operation_id** | **int**| Operation ID | |

### Return type

[**\OpenAPI\Client\Model\OperationOperationIDGet200Response**](../Model/OperationOperationIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `operationPost()`

```php
operationPost($operation_post_request): \OpenAPI\Client\Model\OperationPost200Response
```

Create balance replenishment

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BillingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$operation_post_request = new \OpenAPI\Client\Model\OperationPostRequest(); // \OpenAPI\Client\Model\OperationPostRequest

try {
    $result = $apiInstance->operationPost($operation_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BillingApi->operationPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **operation_post_request** | [**\OpenAPI\Client\Model\OperationPostRequest**](../Model/OperationPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\OperationPost200Response**](../Model/OperationPost200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
