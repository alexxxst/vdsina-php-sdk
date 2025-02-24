# OpenAPI\Client\DNSApi

All URIs are relative to https://userapi.vdsina.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**dnsGet()**](DNSApi.md#dnsGet) | **GET** /dns | All services list with DNS |
| [**dnsPost()**](DNSApi.md#dnsPost) | **POST** /dns | Create DNS service |
| [**dnsRecordRecordIDDelete()**](DNSApi.md#dnsRecordRecordIDDelete) | **DELETE** /dns.record/{recordID} | Delete DNS record |
| [**dnsRecordRecordIDPut()**](DNSApi.md#dnsRecordRecordIDPut) | **PUT** /dns.record/{recordID} | Update DNS record |
| [**dnsRecordServiceIDGet()**](DNSApi.md#dnsRecordServiceIDGet) | **GET** /dns.record/{serviceID} | View DNS records of DNS service |
| [**dnsRecordServiceIDPost()**](DNSApi.md#dnsRecordServiceIDPost) | **POST** /dns.record/{serviceID} | Create DNS record for DNS service |
| [**dnsServiceIDDelete()**](DNSApi.md#dnsServiceIDDelete) | **DELETE** /dns/{serviceID} | Delete DNS service |
| [**dnsServiceIDGet()**](DNSApi.md#dnsServiceIDGet) | **GET** /dns/{serviceID} | View DNS service data |


## `dnsGet()`

```php
dnsGet(): \OpenAPI\Client\Model\DnsGet200Response
```

All services list with DNS

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DNSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->dnsGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DNSApi->dnsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\DnsGet200Response**](../Model/DnsGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `dnsPost()`

```php
dnsPost($dns_post_request): \OpenAPI\Client\Model\DnsPost202Response
```

Create DNS service

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DNSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$dns_post_request = new \OpenAPI\Client\Model\DnsPostRequest(); // \OpenAPI\Client\Model\DnsPostRequest

try {
    $result = $apiInstance->dnsPost($dns_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DNSApi->dnsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **dns_post_request** | [**\OpenAPI\Client\Model\DnsPostRequest**](../Model/DnsPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\DnsPost202Response**](../Model/DnsPost202Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `dnsRecordRecordIDDelete()`

```php
dnsRecordRecordIDDelete($record_id): \OpenAPI\Client\Model\DnsRecordRecordIDDelete200Response
```

Delete DNS record

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DNSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$record_id = 56; // int | DNS record ID

try {
    $result = $apiInstance->dnsRecordRecordIDDelete($record_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DNSApi->dnsRecordRecordIDDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **record_id** | **int**| DNS record ID | |

### Return type

[**\OpenAPI\Client\Model\DnsRecordRecordIDDelete200Response**](../Model/DnsRecordRecordIDDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `dnsRecordRecordIDPut()`

```php
dnsRecordRecordIDPut($record_id, $dns_record_record_id_put_request): \OpenAPI\Client\Model\DnsRecordRecordIDPut200Response
```

Update DNS record

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DNSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$record_id = 56; // int | DNS record ID
$dns_record_record_id_put_request = new \OpenAPI\Client\Model\DnsRecordRecordIDPutRequest(); // \OpenAPI\Client\Model\DnsRecordRecordIDPutRequest

try {
    $result = $apiInstance->dnsRecordRecordIDPut($record_id, $dns_record_record_id_put_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DNSApi->dnsRecordRecordIDPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **record_id** | **int**| DNS record ID | |
| **dns_record_record_id_put_request** | [**\OpenAPI\Client\Model\DnsRecordRecordIDPutRequest**](../Model/DnsRecordRecordIDPutRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\DnsRecordRecordIDPut200Response**](../Model/DnsRecordRecordIDPut200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `dnsRecordServiceIDGet()`

```php
dnsRecordServiceIDGet($service_id): \OpenAPI\Client\Model\DnsRecordServiceIDGet200Response
```

View DNS records of DNS service

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DNSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$service_id = 56; // int | DNS Service ID

try {
    $result = $apiInstance->dnsRecordServiceIDGet($service_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DNSApi->dnsRecordServiceIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **service_id** | **int**| DNS Service ID | |

### Return type

[**\OpenAPI\Client\Model\DnsRecordServiceIDGet200Response**](../Model/DnsRecordServiceIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `dnsRecordServiceIDPost()`

```php
dnsRecordServiceIDPost($service_id, $dns_record_service_id_post_request): \OpenAPI\Client\Model\DnsRecordServiceIDPost200Response
```

Create DNS record for DNS service

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DNSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$service_id = 56; // int | DNS Service ID
$dns_record_service_id_post_request = new \OpenAPI\Client\Model\DnsRecordServiceIDPostRequest(); // \OpenAPI\Client\Model\DnsRecordServiceIDPostRequest

try {
    $result = $apiInstance->dnsRecordServiceIDPost($service_id, $dns_record_service_id_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DNSApi->dnsRecordServiceIDPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **service_id** | **int**| DNS Service ID | |
| **dns_record_service_id_post_request** | [**\OpenAPI\Client\Model\DnsRecordServiceIDPostRequest**](../Model/DnsRecordServiceIDPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\DnsRecordServiceIDPost200Response**](../Model/DnsRecordServiceIDPost200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `dnsServiceIDDelete()`

```php
dnsServiceIDDelete($service_id): \OpenAPI\Client\Model\DnsServiceIDDelete200Response
```

Delete DNS service

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DNSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$service_id = 56; // int | DNS Service ID

try {
    $result = $apiInstance->dnsServiceIDDelete($service_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DNSApi->dnsServiceIDDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **service_id** | **int**| DNS Service ID | |

### Return type

[**\OpenAPI\Client\Model\DnsServiceIDDelete200Response**](../Model/DnsServiceIDDelete200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `dnsServiceIDGet()`

```php
dnsServiceIDGet($service_id): \OpenAPI\Client\Model\DnsServiceIDGet200Response
```

View DNS service data

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\DNSApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$service_id = 56; // int | DNS Service ID

try {
    $result = $apiInstance->dnsServiceIDGet($service_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DNSApi->dnsServiceIDGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **service_id** | **int**| DNS Service ID | |

### Return type

[**\OpenAPI\Client\Model\DnsServiceIDGet200Response**](../Model/DnsServiceIDGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
