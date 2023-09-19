# OpenAPI\Client\UserDevicesApi

All URIs are relative to https://api.passage.id/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteUserDevices()**](UserDevicesApi.md#deleteUserDevices) | **DELETE** /apps/{app_id}/users/{user_id}/devices/{device_id} | Delete a device for a user |
| [**listUserDevices()**](UserDevicesApi.md#listUserDevices) | **GET** /apps/{app_id}/users/{user_id}/devices | List User Devices |


## `deleteUserDevices()`

```php
deleteUserDevices($app_id, $user_id, $device_id)
```

Delete a device for a user

Delete a device for a user.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UserDevicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string | App ID
$user_id = 'user_id_example'; // string | User ID
$device_id = 'device_id_example'; // string | Device ID

try {
    $apiInstance->deleteUserDevices($app_id, $user_id, $device_id);
} catch (Exception $e) {
    echo 'Exception when calling UserDevicesApi->deleteUserDevices: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**| App ID | |
| **user_id** | **string**| User ID | |
| **device_id** | **string**| Device ID | |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listUserDevices()`

```php
listUserDevices($app_id, $user_id): \OpenAPI\Client\Model\ListDevicesResponse
```

List User Devices

List user devices.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UserDevicesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string | App ID
$user_id = 'user_id_example'; // string | User ID

try {
    $result = $apiInstance->listUserDevices($app_id, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserDevicesApi->listUserDevices: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**| App ID | |
| **user_id** | **string**| User ID | |

### Return type

[**\OpenAPI\Client\Model\ListDevicesResponse**](../Model/ListDevicesResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
