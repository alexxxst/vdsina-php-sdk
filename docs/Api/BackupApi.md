# OpenAPI\Client\BackupApi

All URIs are relative to https://userapi.vdsina.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**backupBackupIDDelete()**](BackupApi.md#backupBackupIDDelete) | **DELETE** /backup/{backupID} | Delete backup |
| [**backupBackupIDGet()**](BackupApi.md#backupBackupIDGet) | **GET** /backup/{backupID} | View backup information |
| [**backupBackupIDPut()**](BackupApi.md#backupBackupIDPut) | **PUT** /backup/{backupID} | Update backup information |
| [**backupCopyBackupIDPost()**](BackupApi.md#backupCopyBackupIDPost) | **POST** /backup.copy/{backupID} | Copy backup to another datacenter |
| [**backupGet()**](BackupApi.md#backupGet) | **GET** /backup | Backups list |
| [**backupRestoreBackupIDPost()**](BackupApi.md#backupRestoreBackupIDPost) | **POST** /backup.restore/{backupID} | Restore backup to service |
| [**backupServiceIDPost()**](BackupApi.md#backupServiceIDPost) | **POST** /backup/{serviceID} | Create new backup of service |


## `backupBackupIDDelete()`

```php
backupBackupIDDelete($backup_id): \OpenAPI\Client\Model\BackupBackupIDDelete200Response
```

Delete backup

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BackupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$backup_id = 56; // int | Backup ID

try {
    $result = $apiInstance->backupBackupIDDelete($backup_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupApi->backupBackupIDDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **backup_id** | **int**| Backup ID | |

### Return type

[**\OpenAPI\Client\Model\BackupBackupIDDelete200Response**](../Model/BackupBackupIDDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `backupBackupIDGet()`

```php
backupBackupIDGet($backup_id): \OpenAPI\Client\Model\BackupBackupIDGet200Response
```

View backup information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BackupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$backup_id = 56; // int | Backup ID

try {
    $result = $apiInstance->backupBackupIDGet($backup_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupApi->backupBackupIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **backup_id** | **int**| Backup ID | |

### Return type

[**\OpenAPI\Client\Model\BackupBackupIDGet200Response**](../Model/BackupBackupIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `backupBackupIDPut()`

```php
backupBackupIDPut($backup_id, $backup_backup_id_put_request): \OpenAPI\Client\Model\BackupBackupIDPut200Response
```

Update backup information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BackupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$backup_id = 56; // int | Backup ID
$backup_backup_id_put_request = new \OpenAPI\Client\Model\BackupBackupIDPutRequest(); // \OpenAPI\Client\Model\BackupBackupIDPutRequest

try {
    $result = $apiInstance->backupBackupIDPut($backup_id, $backup_backup_id_put_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupApi->backupBackupIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **backup_id** | **int**| Backup ID | |
| **backup_backup_id_put_request** | [**\OpenAPI\Client\Model\BackupBackupIDPutRequest**](../Model/BackupBackupIDPutRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\BackupBackupIDPut200Response**](../Model/BackupBackupIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `backupCopyBackupIDPost()`

```php
backupCopyBackupIDPost($backup_id, $backup_copy_backup_id_post_request): \OpenAPI\Client\Model\BackupCopyBackupIDPost202Response
```

Copy backup to another datacenter

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BackupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$backup_id = 56; // int | Backup ID
$backup_copy_backup_id_post_request = new \OpenAPI\Client\Model\BackupCopyBackupIDPostRequest(); // \OpenAPI\Client\Model\BackupCopyBackupIDPostRequest

try {
    $result = $apiInstance->backupCopyBackupIDPost($backup_id, $backup_copy_backup_id_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupApi->backupCopyBackupIDPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **backup_id** | **int**| Backup ID | |
| **backup_copy_backup_id_post_request** | [**\OpenAPI\Client\Model\BackupCopyBackupIDPostRequest**](../Model/BackupCopyBackupIDPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\BackupCopyBackupIDPost202Response**](../Model/BackupCopyBackupIDPost202Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `backupGet()`

```php
backupGet(): \OpenAPI\Client\Model\BackupGet200Response
```

Backups list

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BackupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->backupGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupApi->backupGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\BackupGet200Response**](../Model/BackupGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `backupRestoreBackupIDPost()`

```php
backupRestoreBackupIDPost($backup_id, $backup_restore_backup_id_post_request): \OpenAPI\Client\Model\BackupRestoreBackupIDPost200Response
```

Restore backup to service

Service and backup must be in the same datacenter. Service disk size must not be smaller than backup size.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BackupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$backup_id = 56; // int | Backup ID
$backup_restore_backup_id_post_request = new \OpenAPI\Client\Model\BackupRestoreBackupIDPostRequest(); // \OpenAPI\Client\Model\BackupRestoreBackupIDPostRequest

try {
    $result = $apiInstance->backupRestoreBackupIDPost($backup_id, $backup_restore_backup_id_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupApi->backupRestoreBackupIDPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **backup_id** | **int**| Backup ID | |
| **backup_restore_backup_id_post_request** | [**\OpenAPI\Client\Model\BackupRestoreBackupIDPostRequest**](../Model/BackupRestoreBackupIDPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\BackupRestoreBackupIDPost200Response**](../Model/BackupRestoreBackupIDPost200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `backupServiceIDPost()`

```php
backupServiceIDPost($service_id): \OpenAPI\Client\Model\BackupServiceIDPost202Response
```

Create new backup of service

Backup will be created in the same datacenter where service is located.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BackupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$service_id = 56; // int | Service ID (server or external disk)

try {
    $result = $apiInstance->backupServiceIDPost($service_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupApi->backupServiceIDPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **service_id** | **int**| Service ID (server or external disk) | |

### Return type

[**\OpenAPI\Client\Model\BackupServiceIDPost202Response**](../Model/BackupServiceIDPost202Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
