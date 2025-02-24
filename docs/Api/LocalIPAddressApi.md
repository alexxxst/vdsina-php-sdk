# OpenAPI\Client\LocalIPAddressApi

All URIs are relative to https://userapi.vdsina.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**serverIpLocalServerIDDelete()**](LocalIPAddressApi.md#serverIpLocalServerIDDelete) | **DELETE** /server.ip.local/{serverID} | Delete server local IP address |
| [**serverIpLocalServerIDGet()**](LocalIPAddressApi.md#serverIpLocalServerIDGet) | **GET** /server.ip.local/{serverID} | View info about server local IP address |
| [**serverIpLocalServerIDPost()**](LocalIPAddressApi.md#serverIpLocalServerIDPost) | **POST** /server.ip.local/{serverID} | Create server local IP address |


## `serverIpLocalServerIDDelete()`

```php
serverIpLocalServerIDDelete($server_id): \OpenAPI\Client\Model\ServerIpLocalServerIDDelete200Response
```

Delete server local IP address

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\LocalIPAddressApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID

try {
    $result = $apiInstance->serverIpLocalServerIDDelete($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocalIPAddressApi->serverIpLocalServerIDDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |

### Return type

[**\OpenAPI\Client\Model\ServerIpLocalServerIDDelete200Response**](../Model/ServerIpLocalServerIDDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverIpLocalServerIDGet()`

```php
serverIpLocalServerIDGet($server_id): \OpenAPI\Client\Model\ServerIpLocalServerIDGet200Response
```

View info about server local IP address

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\LocalIPAddressApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID

try {
    $result = $apiInstance->serverIpLocalServerIDGet($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocalIPAddressApi->serverIpLocalServerIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |

### Return type

[**\OpenAPI\Client\Model\ServerIpLocalServerIDGet200Response**](../Model/ServerIpLocalServerIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverIpLocalServerIDPost()`

```php
serverIpLocalServerIDPost($server_id): \OpenAPI\Client\Model\ServerIpLocalServerIDPost200Response
```

Create server local IP address

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\LocalIPAddressApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID

try {
    $result = $apiInstance->serverIpLocalServerIDPost($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LocalIPAddressApi->serverIpLocalServerIDPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |

### Return type

[**\OpenAPI\Client\Model\ServerIpLocalServerIDPost200Response**](../Model/ServerIpLocalServerIDPost200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
