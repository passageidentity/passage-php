# OpenAPI\Client\MagicLinksApi

All URIs are relative to https://api.passage.id/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createMagicLink()**](MagicLinksApi.md#createMagicLink) | **POST** /apps/{app_id}/magic-links | Create Embeddable Magic Link |


## `createMagicLink()`

```php
createMagicLink($create_magic_link_request): \OpenAPI\Client\Model\MagicLinkResponse
```

Create Embeddable Magic Link

Create magic link for a user.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Passage\Client\Controllers\Passage(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string | App ID
$create_magic_link_request = new \OpenAPI\Client\Model\CreateMagicLinkRequest(); // \OpenAPI\Client\Model\CreateMagicLinkRequest | magic link request

try {
    $result = $apiInstance->createMagicLink($create_magic_link_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MagicLinksApi->createMagicLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_magic_link_request** | [**\OpenAPI\Client\Model\CreateMagicLinkRequest**](../Model/CreateMagicLinkRequest.md)| magic link request | |

### Return type

[**\OpenAPI\Client\Model\MagicLinkResponse**](../Model/MagicLinkResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
