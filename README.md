<img src="https://storage.googleapis.com/passage-docs/passage-logo-gradient.svg" alt="Passage logo" style="width:250px;"/>

# passage-php


This PHP SDK allows for verification of server-side authentication for applications using [Passage](https://passage.id)

For more information, please visit [Passage Documentation](https://docs.passage.id).


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

$app_id = 'app_id_example'; // string | App ID
$api_key = 'app_id_example'; // string | App ID
$passageInstance = new Passage\Client\Controllers\Passage(
  $app_id,
  $api_key
);

try {
    $result = $passageInstance->getApp($app_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppsApi->getApp: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.passage.id/v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AppsApi* | [**getApp**](docs/Passage/AppsApi.md#getapp) | **GET** /apps/{app_id} | Get App
*MagicLinksApi* | [**createMagicLink**](docs/Passage/MagicLinksApi.md#createmagiclink) | **POST** /apps/{app_id}/magic-links | Create Embeddable Magic Link
*TokensApi* | [**revokeUserRefreshTokens**](docs/Passage/TokensApi.md#revokeuserrefreshtokens) | **DELETE** /apps/{app_id}/users/{user_id}/tokens | Revokes refresh tokens
*UserDevicesApi* | [**deleteUserDevices**](docs/Passage/UserDevicesApi.md#deleteuserdevices) | **DELETE** /apps/{app_id}/users/{user_id}/devices/{device_id} | Delete a device for a user
*UserDevicesApi* | [**listUserDevices**](docs/Passage/UserDevicesApi.md#listuserdevices) | **GET** /apps/{app_id}/users/{user_id}/devices | List User Devices
*UsersApi* | [**activateUser**](docs/Passage/UsersApi.md#activateuser) | **PATCH** /apps/{app_id}/users/{user_id}/activate | Activate User
*UsersApi* | [**createUser**](docs/Passage/UsersApi.md#createuser) | **POST** /apps/{app_id}/users | Create User
*UsersApi* | [**deactivateUser**](docs/Passage/UsersApi.md#deactivateuser) | **PATCH** /apps/{app_id}/users/{user_id}/deactivate | Deactivate User
*UsersApi* | [**deleteUser**](docs/Passage/UsersApi.md#deleteuser) | **DELETE** /apps/{app_id}/users/{user_id} | Delete User
*UsersApi* | [**getUser**](docs/Passage/UsersApi.md#getuser) | **GET** /apps/{app_id}/users/{user_id} | Get User
*UsersApi* | [**updateUser**](docs/Passage/UsersApi.md#updateuser) | **PATCH** /apps/{app_id}/users/{user_id} | Update User

## Models

- [AppInfo](docs/Model/AppInfo.md)
- [AppResponse](docs/Model/AppResponse.md)
- [CreateMagicLinkRequest](docs/Model/CreateMagicLinkRequest.md)
- [CreateUserRequest](docs/Model/CreateUserRequest.md)
- [ElementCustomization](docs/Model/ElementCustomization.md)
- [FontFamily](docs/Model/FontFamily.md)
- [LayoutConfig](docs/Model/LayoutConfig.md)
- [Layouts](docs/Model/Layouts.md)
- [ListDevicesResponse](docs/Model/ListDevicesResponse.md)
- [MagicLink](docs/Model/MagicLink.md)
- [MagicLinkResponse](docs/Model/MagicLinkResponse.md)
- [MagicLinkType](docs/Model/MagicLinkType.md)
- [Model400Error](docs/Model/Model400Error.md)
- [Model401Error](docs/Model/Model401Error.md)
- [Model404Error](docs/Model/Model404Error.md)
- [Model500Error](docs/Model/Model500Error.md)
- [Technologies](docs/Model/Technologies.md)
- [UpdateUserRequest](docs/Model/UpdateUserRequest.md)
- [UserEventInfo](docs/Model/UserEventInfo.md)
- [UserInfo](docs/Model/UserInfo.md)
- [UserMetadataField](docs/Model/UserMetadataField.md)
- [UserMetadataFieldType](docs/Model/UserMetadataFieldType.md)
- [UserResponse](docs/Model/UserResponse.md)
- [WebAuthnDevices](docs/Model/WebAuthnDevices.md)

## Authorization

Authentication schemes defined for the API:
### bearerAuth

**Type**: Bearer authentication (JWT)

**Method**: [validateJWT](docs/Passage/Authentication.md#validatejwt)

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

