# OpenAPI\Client\ServerApi

All URIs are relative to https://userapi.vdsina.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**serverGet()**](ServerApi.md#serverGet) | **GET** /server | Servers list |
| [**serverIpLocalServerIDDelete()**](ServerApi.md#serverIpLocalServerIDDelete) | **DELETE** /server.ip.local/{serverID} | Delete server local IP address |
| [**serverIpLocalServerIDGet()**](ServerApi.md#serverIpLocalServerIDGet) | **GET** /server.ip.local/{serverID} | View info about server local IP address |
| [**serverIpLocalServerIDPost()**](ServerApi.md#serverIpLocalServerIDPost) | **POST** /server.ip.local/{serverID} | Create server local IP address |
| [**serverIpServerIDGet()**](ServerApi.md#serverIpServerIDGet) | **GET** /server.ip/{serverID} | Services list with additional IP addresses |
| [**serverIpServerIDPost()**](ServerApi.md#serverIpServerIDPost) | **POST** /server.ip/{serverID} | Order additional IP addresses for server |
| [**serverIpServerIDPut()**](ServerApi.md#serverIpServerIDPut) | **PUT** /server.ip/{serverID} | Delete additional IP addresses for server |
| [**serverIsoServerIDDelete()**](ServerApi.md#serverIsoServerIDDelete) | **DELETE** /server.iso/{serverID} | Detach ISO from server |
| [**serverIsoServerIDPut()**](ServerApi.md#serverIsoServerIDPut) | **PUT** /server.iso/{serverID} | Attach ISO to server |
| [**serverPasswordServerIDGet()**](ServerApi.md#serverPasswordServerIDGet) | **GET** /server.password/{serverID} | Get server password |
| [**serverPasswordServerIDPut()**](ServerApi.md#serverPasswordServerIDPut) | **PUT** /server.password/{serverID} | Set server password |
| [**serverPlanServerIDPut()**](ServerApi.md#serverPlanServerIDPut) | **PUT** /server.plan/{serverID} | Change server tariff plan |
| [**serverPost()**](ServerApi.md#serverPost) | **POST** /server | Create new server |
| [**serverProlongServerIDPut()**](ServerApi.md#serverProlongServerIDPut) | **PUT** /server.prolong/{serverID} | Prolong and start server |
| [**serverRebootServerIDPut()**](ServerApi.md#serverRebootServerIDPut) | **PUT** /server.reboot/{serverID} | Server reboot |
| [**serverReinstallServerIDPut()**](ServerApi.md#serverReinstallServerIDPut) | **PUT** /server.reinstall/{serverID} | Reinstalling the server |
| [**serverServerIDDelete()**](ServerApi.md#serverServerIDDelete) | **DELETE** /server/{serverID} | Delete server |
| [**serverServerIDGet()**](ServerApi.md#serverServerIDGet) | **GET** /server/{serverID} | View server info |
| [**serverServerIDPut()**](ServerApi.md#serverServerIDPut) | **PUT** /server/{serverID} | Update server parameters |
| [**serverStatServerIDGet()**](ServerApi.md#serverStatServerIDGet) | **GET** /server.stat/{serverID} | Server statistics |


## `serverGet()`

```php
serverGet(): \OpenAPI\Client\Model\ServerGet200Response
```

Servers list

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->serverGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\ServerGet200Response**](../Model/ServerGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

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


$apiInstance = new OpenAPI\Client\Api\ServerApi(
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
    echo 'Exception when calling ServerApi->serverIpLocalServerIDDelete: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\ServerApi(
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
    echo 'Exception when calling ServerApi->serverIpLocalServerIDGet: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\ServerApi(
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
    echo 'Exception when calling ServerApi->serverIpLocalServerIDPost: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\ServerApi(
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
    echo 'Exception when calling ServerApi->serverIpServerIDGet: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\ServerApi(
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
    echo 'Exception when calling ServerApi->serverIpServerIDPost: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\ServerApi(
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
    echo 'Exception when calling ServerApi->serverIpServerIDPut: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\ServerApi(
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
    echo 'Exception when calling ServerApi->serverIsoServerIDDelete: ', $e->getMessage(), PHP_EOL;
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


$apiInstance = new OpenAPI\Client\Api\ServerApi(
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
    echo 'Exception when calling ServerApi->serverIsoServerIDPut: ', $e->getMessage(), PHP_EOL;
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

## `serverPasswordServerIDGet()`

```php
serverPasswordServerIDGet($server_id): \OpenAPI\Client\Model\ServerPasswordServerIDGet200Response
```

Get server password

Get default server password

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID

try {
    $result = $apiInstance->serverPasswordServerIDGet($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverPasswordServerIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |

### Return type

[**\OpenAPI\Client\Model\ServerPasswordServerIDGet200Response**](../Model/ServerPasswordServerIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverPasswordServerIDPut()`

```php
serverPasswordServerIDPut($server_id, $server_password_server_id_put_request): \OpenAPI\Client\Model\ServerPasswordServerIDPut200Response
```

Set server password

The server will be restarted, root user password will set in supported Linux distributions. Attention, if you are using an OS installed from your ISO or Windows or FreeBSD OS is installed on the server, the OS administrator password will not be changed

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID
$server_password_server_id_put_request = new \OpenAPI\Client\Model\ServerPasswordServerIDPutRequest(); // \OpenAPI\Client\Model\ServerPasswordServerIDPutRequest

try {
    $result = $apiInstance->serverPasswordServerIDPut($server_id, $server_password_server_id_put_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverPasswordServerIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |
| **server_password_server_id_put_request** | [**\OpenAPI\Client\Model\ServerPasswordServerIDPutRequest**](../Model/ServerPasswordServerIDPutRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ServerPasswordServerIDPut200Response**](../Model/ServerPasswordServerIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverPlanServerIDPut()`

```php
serverPlanServerIDPut($server_id, $server_plan_server_id_put_request): \OpenAPI\Client\Model\ServerPlanServerIDPut200Response
```

Change server tariff plan

Changing the tariff plan to a junior one is technically impossible. The server will be restarted.  After changing the tariff plan, resources will be added automatically, you need to manually expand the file system to the entire new disk partition using OS tools.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID
$server_plan_server_id_put_request = new \OpenAPI\Client\Model\ServerPlanServerIDPutRequest(); // \OpenAPI\Client\Model\ServerPlanServerIDPutRequest

try {
    $result = $apiInstance->serverPlanServerIDPut($server_id, $server_plan_server_id_put_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverPlanServerIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |
| **server_plan_server_id_put_request** | [**\OpenAPI\Client\Model\ServerPlanServerIDPutRequest**](../Model/ServerPlanServerIDPutRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ServerPlanServerIDPut200Response**](../Model/ServerPlanServerIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverPost()`

```php
serverPost($server_post_request): \OpenAPI\Client\Model\ServerPost202Response
```

Create new server

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_post_request = new \OpenAPI\Client\Model\ServerPostRequest(); // \OpenAPI\Client\Model\ServerPostRequest

try {
    $result = $apiInstance->serverPost($server_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_post_request** | [**\OpenAPI\Client\Model\ServerPostRequest**](../Model/ServerPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ServerPost202Response**](../Model/ServerPost202Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverProlongServerIDPut()`

```php
serverProlongServerIDPut($server_id): \OpenAPI\Client\Model\ServerProlongServerIDPut200Response
```

Prolong and start server

Use in case when the server was not started after payment, for example, due to disabled auto-renewal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID

try {
    $result = $apiInstance->serverProlongServerIDPut($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverProlongServerIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |

### Return type

[**\OpenAPI\Client\Model\ServerProlongServerIDPut200Response**](../Model/ServerProlongServerIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverRebootServerIDPut()`

```php
serverRebootServerIDPut($server_id, $server_reboot_server_id_put_request): \OpenAPI\Client\Model\ServerRebootServerIDPut200Response
```

Server reboot

Server restart by server ID. Additionally, you can pass the 'type', which can take the values 'soft' or 'hard'. When soft (by default), reboot signal will be sent to the server. When hard, to the operating system will be sent a shutdown signal, after a while the status of the server will be checked, if it is turned off, it will be started again, otherwise the server will be shut down forcibly (with possible data loss in the running system), and after that it will be started again.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID
$server_reboot_server_id_put_request = new \OpenAPI\Client\Model\ServerRebootServerIDPutRequest(); // \OpenAPI\Client\Model\ServerRebootServerIDPutRequest

try {
    $result = $apiInstance->serverRebootServerIDPut($server_id, $server_reboot_server_id_put_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverRebootServerIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |
| **server_reboot_server_id_put_request** | [**\OpenAPI\Client\Model\ServerRebootServerIDPutRequest**](../Model/ServerRebootServerIDPutRequest.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\ServerRebootServerIDPut200Response**](../Model/ServerRebootServerIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverReinstallServerIDPut()`

```php
serverReinstallServerIDPut($server_id, $server_reinstall_server_id_put_request): \OpenAPI\Client\Model\ServerReinstallServerIDPut200Response
```

Reinstalling the server

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID
$server_reinstall_server_id_put_request = new \OpenAPI\Client\Model\ServerReinstallServerIDPutRequest(); // \OpenAPI\Client\Model\ServerReinstallServerIDPutRequest

try {
    $result = $apiInstance->serverReinstallServerIDPut($server_id, $server_reinstall_server_id_put_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverReinstallServerIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |
| **server_reinstall_server_id_put_request** | [**\OpenAPI\Client\Model\ServerReinstallServerIDPutRequest**](../Model/ServerReinstallServerIDPutRequest.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\ServerReinstallServerIDPut200Response**](../Model/ServerReinstallServerIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverServerIDDelete()`

```php
serverServerIDDelete($server_id): \OpenAPI\Client\Model\ServerServerIDDelete200Response
```

Delete server

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID

try {
    $result = $apiInstance->serverServerIDDelete($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIDDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |

### Return type

[**\OpenAPI\Client\Model\ServerServerIDDelete200Response**](../Model/ServerServerIDDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverServerIDGet()`

```php
serverServerIDGet($server_id): \OpenAPI\Client\Model\ServerServerIDGet200Response
```

View server info

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID

try {
    $result = $apiInstance->serverServerIDGet($server_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |

### Return type

[**\OpenAPI\Client\Model\ServerServerIDGet200Response**](../Model/ServerServerIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverServerIDPut()`

```php
serverServerIDPut($server_id, $server_server_id_put_request): \OpenAPI\Client\Model\ServerServerIDPut200Response
```

Update server parameters

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID
$server_server_id_put_request = new \OpenAPI\Client\Model\ServerServerIDPutRequest(); // \OpenAPI\Client\Model\ServerServerIDPutRequest

try {
    $result = $apiInstance->serverServerIDPut($server_id, $server_server_id_put_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverServerIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |
| **server_server_id_put_request** | [**\OpenAPI\Client\Model\ServerServerIDPutRequest**](../Model/ServerServerIDPutRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ServerServerIDPut200Response**](../Model/ServerServerIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `serverStatServerIDGet()`

```php
serverStatServerIDGet($server_id, $from, $to): \OpenAPI\Client\Model\ServerStatServerIDGet200Response
```

Server statistics

Getting statistics data for the server. By default, information for the last 30 days is displayed. When specifying the from and to parameters, you can get statistics output for the specified period, it is permissible to specify the date/time in standard formats in the parameters. Statistics are displayed in blocks for every hour.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ServerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$server_id = 56; // int | Server ID
$from = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Filter date from
$to = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Filter date to

try {
    $result = $apiInstance->serverStatServerIDGet($server_id, $from, $to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ServerApi->serverStatServerIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **server_id** | **int**| Server ID | |
| **from** | **\DateTime**| Filter date from | [optional] |
| **to** | **\DateTime**| Filter date to | [optional] |

### Return type

[**\OpenAPI\Client\Model\ServerStatServerIDGet200Response**](../Model/ServerStatServerIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
