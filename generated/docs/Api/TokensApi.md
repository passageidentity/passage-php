# OpenAPI\Client\TokensApi

All URIs are relative to https://api.passage.id/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**revokeUserRefreshTokens()**](TokensApi.md#revokeUserRefreshTokens) | **DELETE** /apps/{app_id}/users/{user_id}/tokens | Revokes refresh tokens |


## `revokeUserRefreshTokens()`

```php
revokeUserRefreshTokens($app_id, $user_id)
```

Revokes refresh tokens

Revokes all refresh tokens for a user

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\TokensApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string | App ID
$user_id = 'user_id_example'; // string | User ID

try {
    $apiInstance->revokeUserRefreshTokens($app_id, $user_id);
} catch (Exception $e) {
    echo 'Exception when calling TokensApi->revokeUserRefreshTokens: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **app_id** | **string**| App ID | |
| **user_id** | **string**| User ID | |

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
