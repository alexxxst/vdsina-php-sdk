# OpenAPI\Client\IPAddressApi

All URIs are relative to https://userapi.vdsina.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**ipGet()**](IPAddressApi.md#ipGet) | **GET** /ip | IP pool |
| [**ipIpIDGet()**](IPAddressApi.md#ipIpIDGet) | **GET** /ip/{ipID} | IP information |
| [**serverIpGet()**](IPAddressApi.md#serverIpGet) | **GET** /server-ip | All services list with additional IP addresses |
| [**serverIpServerIDGet()**](IPAddressApi.md#serverIpServerIDGet) | **GET** /server.ip/{serverID} | Services list with additional IP addresses |
| [**serverIpServerIDPost()**](IPAddressApi.md#serverIpServerIDPost) | **POST** /server.ip/{serverID} | Order additional IP addresses for server |
| [**serverIpServerIDPut()**](IPAddressApi.md#serverIpServerIDPut) | **PUT** /server.ip/{serverID} | Delete additional IP addresses for server |
| [**serverIpServiceIDDelete()**](IPAddressApi.md#serverIpServiceIDDelete) | **DELETE** /server-ip/{serviceID} | Delete additional IP service |
| [**serverIpServiceIDPut()**](IPAddressApi.md#serverIpServiceIDPut) | **PUT** /server-ip/{serviceID} | Delete additional IP addresses for service |


## `ipGet()`

```php
ipGet(): \OpenAPI\Client\Model\IpGet200Response
```

IP pool

List of all IP addresses assigned to the client

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\IPAddressApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->ipGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->ipGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\IpGet200Response**](../Model/IpGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `ipIpIDGet()`

```php
ipIpIDGet($ip_id): \OpenAPI\Client\Model\IpIpIDGet200Response
```

IP information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\IPAddressApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ip_id = 56; // int | IP ID

try {
    $result = $apiInstance->ipIpIDGet($ip_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->ipIpIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ip_id** | **int**| IP ID | |

### Return type

[**\OpenAPI\Client\Model\IpIpIDGet200Response**](../Model/IpIpIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverIpGet()`

```php
serverIpGet(): \OpenAPI\Client\Model\ServerIpGet200Response
```

All services list with additional IP addresses

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\IPAddressApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->serverIpGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->serverIpGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\ServerIpGet200Response**](../Model/ServerIpGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverIpServerIDGet()`

```php
serverIpServerIDGet($server_id): \OpenAPI\Client\Model\ServerIpServerIDGet200Response
```

Services list with additional IP addresses

Filter services with additional IP addresses by parent server ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\IPAddressApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID

try {
    $result = $apiInstance->serverIpServerIDGet($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->serverIpServerIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |

### Return type

[**\OpenAPI\Client\Model\ServerIpServerIDGet200Response**](../Model/ServerIpServerIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverIpServerIDPost()`

```php
serverIpServerIDPost($server_id, $server_ip_server_id_post_request): \OpenAPI\Client\Model\ServerIpServerIDPost200Response
```

Order additional IP addresses for server

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\IPAddressApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID
$server_ip_server_id_post_request = new \OpenAPI\Client\Model\ServerIpServerIDPostRequest(); // \OpenAPI\Client\Model\ServerIpServerIDPostRequest

try {
    $result = $apiInstance->serverIpServerIDPost($server_id, $server_ip_server_id_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->serverIpServerIDPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |
| **server_ip_server_id_post_request** | [**\OpenAPI\Client\Model\ServerIpServerIDPostRequest**](../Model/ServerIpServerIDPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ServerIpServerIDPost200Response**](../Model/ServerIpServerIDPost200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverIpServerIDPut()`

```php
serverIpServerIDPut($server_id, $server_ip_server_id_put_request): \OpenAPI\Client\Model\ServerIpServerIDPut200Response
```

Delete additional IP addresses for server

Delete IP addresses by list from server

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\IPAddressApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID
$server_ip_server_id_put_request = new \OpenAPI\Client\Model\ServerIpServerIDPutRequest(); // \OpenAPI\Client\Model\ServerIpServerIDPutRequest

try {
    $result = $apiInstance->serverIpServerIDPut($server_id, $server_ip_server_id_put_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->serverIpServerIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |
| **server_ip_server_id_put_request** | [**\OpenAPI\Client\Model\ServerIpServerIDPutRequest**](../Model/ServerIpServerIDPutRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ServerIpServerIDPut200Response**](../Model/ServerIpServerIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverIpServiceIDDelete()`

```php
serverIpServiceIDDelete($service_id): \OpenAPI\Client\Model\ServerIpServiceIDDelete200Response
```

Delete additional IP service

Additional IP service will be deleted, all its IP addresses will be released

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\IPAddressApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$service_id = 56; // int | Additional IP Service ID

try {
    $result = $apiInstance->serverIpServiceIDDelete($service_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->serverIpServiceIDDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **service_id** | **int**| Additional IP Service ID | |

### Return type

[**\OpenAPI\Client\Model\ServerIpServiceIDDelete200Response**](../Model/ServerIpServiceIDDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverIpServiceIDPut()`

```php
serverIpServiceIDPut($service_id, $server_ip_service_id_put_request): \OpenAPI\Client\Model\ServerIpServiceIDPut200Response
```

Delete additional IP addresses for service

Delete IP addresses by list from additional IP service

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\IPAddressApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$service_id = 56; // int | Additional IP Service ID
$server_ip_service_id_put_request = new \OpenAPI\Client\Model\ServerIpServiceIDPutRequest(); // \OpenAPI\Client\Model\ServerIpServiceIDPutRequest

try {
    $result = $apiInstance->serverIpServiceIDPut($service_id, $server_ip_service_id_put_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IPAddressApi->serverIpServiceIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **service_id** | **int**| Additional IP Service ID | |
| **server_ip_service_id_put_request** | [**\OpenAPI\Client\Model\ServerIpServiceIDPutRequest**](../Model/ServerIpServiceIDPutRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ServerIpServiceIDPut200Response**](../Model/ServerIpServiceIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
