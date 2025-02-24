# OpenAPI\Client\SSHKeyApi

All URIs are relative to https://userapi.vdsina.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**sshKeyGet()**](SSHKeyApi.md#sshKeyGet) | **GET** /ssh-key | Get SSH keys list |
| [**sshKeyKeyIDDelete()**](SSHKeyApi.md#sshKeyKeyIDDelete) | **DELETE** /ssh-key/{keyID} | Delete SSH key |
| [**sshKeyKeyIDGet()**](SSHKeyApi.md#sshKeyKeyIDGet) | **GET** /ssh-key/{keyID} | View one SSH key |
| [**sshKeyKeyIDPut()**](SSHKeyApi.md#sshKeyKeyIDPut) | **PUT** /ssh-key/{keyID} | Update SSH key |
| [**sshKeyPost()**](SSHKeyApi.md#sshKeyPost) | **POST** /ssh-key | Create new SSH key |


## `sshKeyGet()`

```php
sshKeyGet(): \OpenAPI\Client\Model\SshKeyGet200Response
```

Get SSH keys list

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHKeyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->sshKeyGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SSHKeyApi->sshKeyGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\SshKeyGet200Response**](../Model/SshKeyGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sshKeyKeyIDDelete()`

```php
sshKeyKeyIDDelete($key_id): \OpenAPI\Client\Model\SshKeyKeyIDDelete200Response
```

Delete SSH key

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHKeyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 56; // int | SSH key ID

try {
    $result = $apiInstance->sshKeyKeyIDDelete($key_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SSHKeyApi->sshKeyKeyIDDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **int**| SSH key ID | |

### Return type

[**\OpenAPI\Client\Model\SshKeyKeyIDDelete200Response**](../Model/SshKeyKeyIDDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sshKeyKeyIDGet()`

```php
sshKeyKeyIDGet($key_id): \OpenAPI\Client\Model\SshKeyKeyIDGet200Response
```

View one SSH key

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHKeyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 56; // int | SSH key ID to view specific one

try {
    $result = $apiInstance->sshKeyKeyIDGet($key_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SSHKeyApi->sshKeyKeyIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **int**| SSH key ID to view specific one | |

### Return type

[**\OpenAPI\Client\Model\SshKeyKeyIDGet200Response**](../Model/SshKeyKeyIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sshKeyKeyIDPut()`

```php
sshKeyKeyIDPut($key_id, $ssh_key_key_id_put_request): \OpenAPI\Client\Model\SshKeyKeyIDPut200Response
```

Update SSH key

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHKeyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key_id = 56; // int | SSH key ID
$ssh_key_key_id_put_request = new \OpenAPI\Client\Model\SshKeyKeyIDPutRequest(); // \OpenAPI\Client\Model\SshKeyKeyIDPutRequest

try {
    $result = $apiInstance->sshKeyKeyIDPut($key_id, $ssh_key_key_id_put_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SSHKeyApi->sshKeyKeyIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **key_id** | **int**| SSH key ID | |
| **ssh_key_key_id_put_request** | [**\OpenAPI\Client\Model\SshKeyKeyIDPutRequest**](../Model/SshKeyKeyIDPutRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\SshKeyKeyIDPut200Response**](../Model/SshKeyKeyIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sshKeyPost()`

```php
sshKeyPost($ssh_key_post_request): \OpenAPI\Client\Model\SshKeyPost201Response
```

Create new SSH key

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\SSHKeyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ssh_key_post_request = new \OpenAPI\Client\Model\SshKeyPostRequest(); // \OpenAPI\Client\Model\SshKeyPostRequest

try {
    $result = $apiInstance->sshKeyPost($ssh_key_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SSHKeyApi->sshKeyPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ssh_key_post_request** | [**\OpenAPI\Client\Model\SshKeyPostRequest**](../Model/SshKeyPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\SshKeyPost201Response**](../Model/SshKeyPost201Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
