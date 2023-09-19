# OpenAPI\Client\UsersApi

All URIs are relative to https://api.passage.id/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**activateUser()**](UsersApi.md#activateUser) | **PATCH** /apps/{app_id}/users/{user_id}/activate | Activate User |
| [**createUser()**](UsersApi.md#createUser) | **POST** /apps/{app_id}/users | Create User |
| [**deactivateUser()**](UsersApi.md#deactivateUser) | **PATCH** /apps/{app_id}/users/{user_id}/deactivate | Deactivate User |
| [**deleteUser()**](UsersApi.md#deleteUser) | **DELETE** /apps/{app_id}/users/{user_id} | Delete User |
| [**getUser()**](UsersApi.md#getUser) | **GET** /apps/{app_id}/users/{user_id} | Get User |
| [**updateUser()**](UsersApi.md#updateUser) | **PATCH** /apps/{app_id}/users/{user_id} | Update User |


## `activateUser()`

```php
activateUser($app_id, $user_id): \OpenAPI\Client\Model\UserResponse
```

Activate User

Activate a user. They will now be able to login.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string | App ID
$user_id = 'user_id_example'; // string | User ID

try {
    $result = $apiInstance->activateUser($app_id, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->activateUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**| App ID | |
| **user_id** | **string**| User ID | |

### Return type

[**\OpenAPI\Client\Model\UserResponse**](../Model/UserResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createUser()`

```php
createUser($app_id, $create_user_request): \OpenAPI\Client\Model\UserResponse
```

Create User

Create user for an application. Must provide an email of phone number identifier.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string | App ID
$create_user_request = new \OpenAPI\Client\Model\CreateUserRequest(); // \OpenAPI\Client\Model\CreateUserRequest | email, phone, user_metadata

try {
    $result = $apiInstance->createUser($app_id, $create_user_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->createUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**| App ID | |
| **create_user_request** | [**\OpenAPI\Client\Model\CreateUserRequest**](../Model/CreateUserRequest.md)| email, phone, user_metadata | |

### Return type

[**\OpenAPI\Client\Model\UserResponse**](../Model/UserResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deactivateUser()`

```php
deactivateUser($app_id, $user_id): \OpenAPI\Client\Model\UserResponse
```

Deactivate User

Deactivate a user. Their account will still exist, but they will not be able to login.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string | App ID
$user_id = 'user_id_example'; // string | User ID

try {
    $result = $apiInstance->deactivateUser($app_id, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->deactivateUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**| App ID | |
| **user_id** | **string**| User ID | |

### Return type

[**\OpenAPI\Client\Model\UserResponse**](../Model/UserResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteUser()`

```php
deleteUser($app_id, $user_id)
```

Delete User

Delete a user.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string | App ID
$user_id = 'user_id_example'; // string | user ID

try {
    $apiInstance->deleteUser($app_id, $user_id);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->deleteUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**| App ID | |
| **user_id** | **string**| user ID | |

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

## `getUser()`

```php
getUser($app_id, $user_id): \OpenAPI\Client\Model\UserResponse
```

Get User

Get information about a user.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string | App ID
$user_id = 'user_id_example'; // string | user ID

try {
    $result = $apiInstance->getUser($app_id, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**| App ID | |
| **user_id** | **string**| user ID | |

### Return type

[**\OpenAPI\Client\Model\UserResponse**](../Model/UserResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateUser()`

```php
updateUser($app_id, $user_id, $update_user_request): \OpenAPI\Client\Model\UserResponse
```

Update User

Update a user's information.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string | App ID
$user_id = 'user_id_example'; // string | user ID
$update_user_request = new \OpenAPI\Client\Model\UpdateUserRequest(); // \OpenAPI\Client\Model\UpdateUserRequest | user settings

try {
    $result = $apiInstance->updateUser($app_id, $user_id, $update_user_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->updateUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**| App ID | |
| **user_id** | **string**| user ID | |
| **update_user_request** | [**\OpenAPI\Client\Model\UpdateUserRequest**](../Model/UpdateUserRequest.md)| user settings | |

### Return type

[**\OpenAPI\Client\Model\UserResponse**](../Model/UserResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
