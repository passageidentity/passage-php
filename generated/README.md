# OpenAPIClient-php

Passage's management API to manage your Passage apps and users.

For more information, please visit [https://passage.id/support](https://passage.id/support).

## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure Bearer (JWT) authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AppsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$app_id = 'app_id_example'; // string | App ID

try {
    $result = $apiInstance->getApp($app_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getApp: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.passage.id/v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AppsApi* | [**getApp**](docs/Api/AppsApi.md#getapp) | **GET** /apps/{app_id} | Get App
*MagicLinksApi* | [**createMagicLink**](docs/Api/MagicLinksApi.md#createmagiclink) | **POST** /apps/{app_id}/magic-links | Create Embeddable Magic Link
*TokensApi* | [**revokeUserRefreshTokens**](docs/Api/TokensApi.md#revokeuserrefreshtokens) | **DELETE** /apps/{app_id}/users/{user_id}/tokens | Revokes refresh tokens
*UserDevicesApi* | [**deleteUserDevices**](docs/Api/UserDevicesApi.md#deleteuserdevices) | **DELETE** /apps/{app_id}/users/{user_id}/devices/{device_id} | Delete a device for a user
*UserDevicesApi* | [**listUserDevices**](docs/Api/UserDevicesApi.md#listuserdevices) | **GET** /apps/{app_id}/users/{user_id}/devices | List User Devices
*UsersApi* | [**activateUser**](docs/Api/UsersApi.md#activateuser) | **PATCH** /apps/{app_id}/users/{user_id}/activate | Activate User
*UsersApi* | [**createUser**](docs/Api/UsersApi.md#createuser) | **POST** /apps/{app_id}/users | Create User
*UsersApi* | [**deactivateUser**](docs/Api/UsersApi.md#deactivateuser) | **PATCH** /apps/{app_id}/users/{user_id}/deactivate | Deactivate User
*UsersApi* | [**deleteUser**](docs/Api/UsersApi.md#deleteuser) | **DELETE** /apps/{app_id}/users/{user_id} | Delete User
*UsersApi* | [**getUser**](docs/Api/UsersApi.md#getuser) | **GET** /apps/{app_id}/users/{user_id} | Get User
*UsersApi* | [**updateUser**](docs/Api/UsersApi.md#updateuser) | **PATCH** /apps/{app_id}/users/{user_id} | Update User

## Models

- [AppInfo](docs/Model/AppInfo.md)
- [AppResponse](docs/Model/AppResponse.md)
- [AuthMethods](docs/Model/AuthMethods.md)
- [CreateMagicLinkRequest](docs/Model/CreateMagicLinkRequest.md)
- [CreateUserRequest](docs/Model/CreateUserRequest.md)
- [ElementCustomization](docs/Model/ElementCustomization.md)
- [EmailSmsAuthMethod](docs/Model/EmailSmsAuthMethod.md)
- [FontFamily](docs/Model/FontFamily.md)
- [LayoutConfig](docs/Model/LayoutConfig.md)
- [Layouts](docs/Model/Layouts.md)
- [ListDevicesResponse](docs/Model/ListDevicesResponse.md)
- [MagicLink](docs/Model/MagicLink.md)
- [MagicLinkChannel](docs/Model/MagicLinkChannel.md)
- [MagicLinkResponse](docs/Model/MagicLinkResponse.md)
- [MagicLinkType](docs/Model/MagicLinkType.md)
- [Model400Error](docs/Model/Model400Error.md)
- [Model401Error](docs/Model/Model401Error.md)
- [Model404Error](docs/Model/Model404Error.md)
- [Model500Error](docs/Model/Model500Error.md)
- [PasskeyAuthMethod](docs/Model/PasskeyAuthMethod.md)
- [Technologies](docs/Model/Technologies.md)
- [TtlDisplayUnit](docs/Model/TtlDisplayUnit.md)
- [UpdateEmailSmsAuthMethod](docs/Model/UpdateEmailSmsAuthMethod.md)
- [UpdatePasskeyAuthMethod](docs/Model/UpdatePasskeyAuthMethod.md)
- [UpdateUserRequest](docs/Model/UpdateUserRequest.md)
- [UserEventInfo](docs/Model/UserEventInfo.md)
- [UserInfo](docs/Model/UserInfo.md)
- [UserMetadataField](docs/Model/UserMetadataField.md)
- [UserMetadataFieldType](docs/Model/UserMetadataFieldType.md)
- [UserResponse](docs/Model/UserResponse.md)
- [UserStatus](docs/Model/UserStatus.md)
- [WebAuthnDevices](docs/Model/WebAuthnDevices.md)
- [WebAuthnIcons](docs/Model/WebAuthnIcons.md)
- [WebAuthnType](docs/Model/WebAuthnType.md)

## Authorization

Authentication schemes defined for the API:
### bearerAuth

- **Type**: Bearer authentication (JWT)

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

support@passage.id

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
