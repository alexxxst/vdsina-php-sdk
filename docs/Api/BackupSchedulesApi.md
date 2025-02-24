# OpenAPI\Client\BackupSchedulesApi

All URIs are relative to https://userapi.vdsina.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**backupScheduleServiceIDDelete()**](BackupSchedulesApi.md#backupScheduleServiceIDDelete) | **DELETE** /backup.schedule/{serviceID} | Delete backup schedule |
| [**backupScheduleServiceIDGet()**](BackupSchedulesApi.md#backupScheduleServiceIDGet) | **GET** /backup.schedule/{serviceID} | Backup schedule list |
| [**backupScheduleServiceIDPost()**](BackupSchedulesApi.md#backupScheduleServiceIDPost) | **POST** /backup.schedule/{serviceID} | Create backup schedule |


## `backupScheduleServiceIDDelete()`

```php
backupScheduleServiceIDDelete($service_id, $type): \OpenAPI\Client\Model\BackupScheduleServiceIDDelete200Response
```

Delete backup schedule

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BackupSchedulesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$service_id = 56; // int | Service ID (server or external disk)
$type = 'type_example'; // string | If property not specified, all schedules will be deleted

try {
    $result = $apiInstance->backupScheduleServiceIDDelete($service_id, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupSchedulesApi->backupScheduleServiceIDDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **service_id** | **int**| Service ID (server or external disk) | |
| **type** | **string**| If property not specified, all schedules will be deleted | [optional] |

### Return type

[**\OpenAPI\Client\Model\BackupScheduleServiceIDDelete200Response**](../Model/BackupScheduleServiceIDDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `backupScheduleServiceIDGet()`

```php
backupScheduleServiceIDGet($service_id): \OpenAPI\Client\Model\BackupScheduleServiceIDGet200Response
```

Backup schedule list

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BackupSchedulesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$service_id = 56; // int | Service ID (server or external disk)

try {
    $result = $apiInstance->backupScheduleServiceIDGet($service_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupSchedulesApi->backupScheduleServiceIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **service_id** | **int**| Service ID (server or external disk) | |

### Return type

[**\OpenAPI\Client\Model\BackupScheduleServiceIDGet200Response**](../Model/BackupScheduleServiceIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `backupScheduleServiceIDPost()`

```php
backupScheduleServiceIDPost($service_id, $backup_schedule_service_id_post_request): \OpenAPI\Client\Model\BackupScheduleServiceIDPost200Response
```

Create backup schedule

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\BackupSchedulesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$service_id = 56; // int | Service ID (server or external disk)
$backup_schedule_service_id_post_request = new \OpenAPI\Client\Model\BackupScheduleServiceIDPostRequest(); // \OpenAPI\Client\Model\BackupScheduleServiceIDPostRequest

try {
    $result = $apiInstance->backupScheduleServiceIDPost($service_id, $backup_schedule_service_id_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupSchedulesApi->backupScheduleServiceIDPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **service_id** | **int**| Service ID (server or external disk) | |
| **backup_schedule_service_id_post_request** | [**\OpenAPI\Client\Model\BackupScheduleServiceIDPostRequest**](../Model/BackupScheduleServiceIDPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\BackupScheduleServiceIDPost200Response**](../Model/BackupScheduleServiceIDPost200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
