# OpenAPI\Client\ISOApi

All URIs are relative to https://userapi.vdsina.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**isoGet()**](ISOApi.md#isoGet) | **GET** /iso | Get ISO list |
| [**isoIsoIDDelete()**](ISOApi.md#isoIsoIDDelete) | **DELETE** /iso/{isoID} | Delete ISO service |
| [**isoIsoIDGet()**](ISOApi.md#isoIsoIDGet) | **GET** /iso/{isoID} | View ISO |
| [**isoKEYGet()**](ISOApi.md#isoKEYGet) | **GET** /iso/{KEY} | Check ISO download status |
| [**isoKEYPost()**](ISOApi.md#isoKEYPost) | **POST** /iso/{KEY} | Create new ISO service |
| [**isoPost()**](ISOApi.md#isoPost) | **POST** /iso | Download ISO |
| [**serverIsoServerIDDelete()**](ISOApi.md#serverIsoServerIDDelete) | **DELETE** /server.iso/{serverID} | Detach ISO from server |
| [**serverIsoServerIDPut()**](ISOApi.md#serverIsoServerIDPut) | **PUT** /server.iso/{serverID} | Attach ISO to server |


## `isoGet()`

```php
isoGet(): \OpenAPI\Client\Model\IsoGet200Response
```

Get ISO list

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ISOApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->isoGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ISOApi->isoGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\IsoGet200Response**](../Model/IsoGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `isoIsoIDDelete()`

```php
isoIsoIDDelete($iso_id): \OpenAPI\Client\Model\IsoIsoIDDelete200Response
```

Delete ISO service

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ISOApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$iso_id = 56; // int | ISO service ID

try {
    $result = $apiInstance->isoIsoIDDelete($iso_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ISOApi->isoIsoIDDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **iso_id** | **int**| ISO service ID | |

### Return type

[**\OpenAPI\Client\Model\IsoIsoIDDelete200Response**](../Model/IsoIsoIDDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `isoIsoIDGet()`

```php
isoIsoIDGet($iso_id): \OpenAPI\Client\Model\IsoIsoIDGet200Response
```

View ISO

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ISOApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$iso_id = 56; // int | ISO service ID

try {
    $result = $apiInstance->isoIsoIDGet($iso_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ISOApi->isoIsoIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **iso_id** | **int**| ISO service ID | |

### Return type

[**\OpenAPI\Client\Model\IsoIsoIDGet200Response**](../Model/IsoIsoIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `isoKEYGet()`

```php
isoKEYGet($key): \OpenAPI\Client\Model\IsoKEYGet200Response
```

Check ISO download status

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ISOApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key = 'key_example'; // string | ISO download job KEY

try {
    $result = $apiInstance->isoKEYGet($key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ISOApi->isoKEYGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key** | **string**| ISO download job KEY | |

### Return type

[**\OpenAPI\Client\Model\IsoKEYGet200Response**](../Model/IsoKEYGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `isoKEYPost()`

```php
isoKEYPost($key): \OpenAPI\Client\Model\IsoKEYPost202Response
```

Create new ISO service

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ISOApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key = 'key_example'; // string | ISO download job KEY

try {
    $result = $apiInstance->isoKEYPost($key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ISOApi->isoKEYPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key** | **string**| ISO download job KEY | |

### Return type

[**\OpenAPI\Client\Model\IsoKEYPost202Response**](../Model/IsoKEYPost202Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `isoPost()`

```php
isoPost($iso_post_request): \OpenAPI\Client\Model\IsoPost202Response
```

Download ISO

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ISOApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$iso_post_request = new \OpenAPI\Client\Model\IsoPostRequest(); // \OpenAPI\Client\Model\IsoPostRequest

try {
    $result = $apiInstance->isoPost($iso_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ISOApi->isoPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **iso_post_request** | [**\OpenAPI\Client\Model\IsoPostRequest**](../Model/IsoPostRequest.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\IsoPost202Response**](../Model/IsoPost202Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverIsoServerIDDelete()`

```php
serverIsoServerIDDelete($server_id): \OpenAPI\Client\Model\ServerIsoServerIDDelete200Response
```

Detach ISO from server

The server will be restarted

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ISOApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID

try {
    $result = $apiInstance->serverIsoServerIDDelete($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ISOApi->serverIsoServerIDDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |

### Return type

[**\OpenAPI\Client\Model\ServerIsoServerIDDelete200Response**](../Model/ServerIsoServerIDDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverIsoServerIDPut()`

```php
serverIsoServerIDPut($server_id, $server_iso_server_id_put_request): \OpenAPI\Client\Model\ServerIsoServerIDPut200Response
```

Attach ISO to server

The server will be restarted

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ISOApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID
$server_iso_server_id_put_request = new \OpenAPI\Client\Model\ServerIsoServerIDPutRequest(); // \OpenAPI\Client\Model\ServerIsoServerIDPutRequest

try {
    $result = $apiInstance->serverIsoServerIDPut($server_id, $server_iso_server_id_put_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ISOApi->serverIsoServerIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |
| **server_iso_server_id_put_request** | [**\OpenAPI\Client\Model\ServerIsoServerIDPutRequest**](../Model/ServerIsoServerIDPutRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ServerIsoServerIDPut200Response**](../Model/ServerIsoServerIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
