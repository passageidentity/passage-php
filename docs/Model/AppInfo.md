# # AppInfo

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**additional_auth_origins** | **string[]** |  |
**allowed_callback_urls** | **string[]** | The valid URLs where users can be redirected after authentication. |
**allowed_identifier** | **string** |  |
**allowed_logout_urls** | **string[]** | The valid URLs where users can be redirected after logging out. |
**application_login_uri** | **string** | A route within your application that redirects to the Authorization URL endpoint. |
**auth_fallback_method** | **string** | Deprecated Property. Please refer to &#x60;auth_methods&#x60; to view settings for individual authentication methods. |
**auth_fallback_method_ttl** | **int** | Deprecated Property. Please refer to &#x60;auth_methods&#x60; to view settings for individual authentication methods. |
**auth_methods** | [**\OpenAPI\Client\Model\AuthMethods**](AuthMethods.md) |  |
**auth_origin** | **string** |  |
**auto_theme_enabled** | **bool** | Deprecated Property. Please use &#x60;hosted_theme&#x60; to set hosted page theming instead. |
**created_at** | **\DateTime** |  |
**default_language** | **string** |  |
**id** | **string** |  |
**layouts** | [**\OpenAPI\Client\Model\Layouts**](Layouts.md) |  |
**login_url** | **string** |  |
**light_logo_url** | **string** |  | [optional]
**dark_logo_url** | **string** |  | [optional]
**name** | **string** |  |
**hosted** | **bool** | whether or not the app&#39;s login page is hosted by Passage |
**hosted_subdomain** | **string** | the subdomain of the app&#39;s hosted login page |
**hosted_theme** | [**\OpenAPI\Client\Model\ThemeType**](ThemeType.md) |  |
**id_token_lifetime** | **int** |  | [optional]
**passage_branding** | **bool** |  |
**profile_management** | **bool** |  |
**public_signup** | **bool** |  |
**redirect_url** | **string** |  |
**refresh_absolute_lifetime** | **int** |  |
**refresh_enabled** | **bool** |  |
**refresh_inactivity_lifetime** | **int** |  |
**require_email_verification** | **bool** |  |
**require_identifier_verification** | **bool** |  |
**required_identifier** | **string** |  |
**role** | **string** |  |
**rsa_public_key** | **string** |  |
**secret** | **string** | can only be retrieved by an app admin | [optional]
**session_timeout_length** | **int** |  |
**type** | **string** |  |
**user_metadata_schema** | [**\OpenAPI\Client\Model\UserMetadataField[]**](UserMetadataField.md) |  |
**technologies** | [**\OpenAPI\Client\Model\Technologies[]**](Technologies.md) |  |
**element_customization** | [**\OpenAPI\Client\Model\ElementCustomization**](ElementCustomization.md) |  |
**element_customization_dark** | [**\OpenAPI\Client\Model\ElementCustomization**](ElementCustomization.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
