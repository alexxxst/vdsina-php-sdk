# OpenAPI\Client\AccountApi

All URIs are relative to https://userapi.vdsina.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**accountBalanceGet()**](AccountApi.md#accountBalanceGet) | **GET** /account.balance | Account balance |
| [**accountGet()**](AccountApi.md#accountGet) | **GET** /account | Account information and shutdown forecast |
| [**accountLimitGet()**](AccountApi.md#accountLimitGet) | **GET** /account.limit | Account limits |
| [**authPost()**](AccountApi.md#authPost) | **POST** /auth | User authentication and token obtain |
| [**registerPost()**](AccountApi.md#registerPost) | **POST** /register | Registration of a new account |


## `accountBalanceGet()`

```php
accountBalanceGet(): \OpenAPI\Client\Model\AccountBalanceGet200Response
```

Account balance

All available balances are returned, main, bonus and partner, if there were no transactions on the account, the balance is not returned

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->accountBalanceGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->accountBalanceGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\AccountBalanceGet200Response**](../Model/AccountBalanceGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `accountGet()`

```php
accountGet(): \OpenAPI\Client\Model\AccountGet200Response
```

Account information and shutdown forecast

The ID and name of the account, the date of creation and the shutdown forecast are returned (the date before which there are enough funds to pay for all services). The data of the shutdown forecast and balance are cached and changed only in case of real changes in accounts or services. The can object will list some account features: the ability to create new users, order new services, withdraw money from accounts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->accountGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->accountGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\AccountGet200Response**](../Model/AccountGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `accountLimitGet()`

```php
accountLimitGet(): \OpenAPI\Client\Model\AccountLimitGet200Response
```

Account limits

For each type of service, an object will be returned that specifies the restrictions: max – the maximum of services of this type in the account, child_max – the maximum of services of this type in the parent service (for example, the number of IPv4 addresses for one server), now - the number of ordered services of this type in the account at the moment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->accountLimitGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->accountLimitGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\AccountLimitGet200Response**](../Model/AccountLimitGet200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `authPost()`

```php
authPost($auth_post_request): \OpenAPI\Client\Model\AuthPost200Response
```

User authentication and token obtain

**YOU SHOULDN'T USE THIS METHOD IN PRODUCTION!**  If user has IP access limit or uses 2FA, it is not possible to login via API. There are restrictions on the number of authentication requests from one IP address, with frequent unsuccessful authentication attempts, the IP address is blocked for 4 hours. The IP address is also checked against Spamhaus blacklists (SBL, SBL CSS, XBL, SBL DROP, TOR), authentication from such addresses is prohibited.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\AccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$auth_post_request = new \OpenAPI\Client\Model\AuthPostRequest(); // \OpenAPI\Client\Model\AuthPostRequest

try {
    $result = $apiInstance->authPost($auth_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->authPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **auth_post_request** | [**\OpenAPI\Client\Model\AuthPostRequest**](../Model/AuthPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\AuthPost200Response**](../Model/AuthPost200Response.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `registerPost()`

```php
registerPost($register_post_request): \OpenAPI\Client\Model\RegisterPost200Response
```

Registration of a new account

To register a new account, you must pass the authorization token of an existing client. To register for the affiliate program, you must pass your affiliate code in the code field. The result of the request will be an data object with data about the new account and user.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (string) authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$register_post_request = new \OpenAPI\Client\Model\RegisterPostRequest(); // \OpenAPI\Client\Model\RegisterPostRequest

try {
    $result = $apiInstance->registerPost($register_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->registerPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **register_post_request** | [**\OpenAPI\Client\Model\RegisterPostRequest**](../Model/RegisterPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\RegisterPost200Response**](../Model/RegisterPost200Response.md)

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
