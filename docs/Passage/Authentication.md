# Passage\Controllers\Authentication

All URIs are relative to https://api.passage.id/v1, except if the operation defines another base path.

## `validateJWT()`

```php
validateJWT($jwtString): string | null
```

Validate JWT string

Valid JWT string returns user id.

### Laravel Example

```php
<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PassageIdentity\PassagePHP\Passage\Controllers\Authentication;

// Authentication using Passage class instance
Route::get('authenticatedRoute', function (Request $request) {
    $passage = new Passage(env('APP_ID'), env('API_KEY'));
    $jwtString = $request->header('psg_auth_token');

    try {
        // Authenticate request using Passage
        $userID = $passage->validateJWT($jwtString);
        if ($userID) {
            // User is authenticated
            $userData = $passage->user->get($userID);
            return;
        }
    } catch (\Exception $e) {
        // Authentication failed
        return "Authentication failed!";
    }
});
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **jwtString** | **string**| JWT Token | |

### Return type

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **userID** | **string/null**| User Id | |



[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to README]](../../README.md)