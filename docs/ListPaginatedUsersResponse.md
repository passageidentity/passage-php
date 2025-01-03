# # ListPaginatedUsersResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**_links** | [**\OpenAPI\Client\Model\PaginatedLinks**](PaginatedLinks.md) |  |
**created_before** | **int** | time anchor (Unix timestamp) --&gt; all users returned created before this timestamp |
**limit** | **int** |  |
**page** | **int** |  |
**total_users** | **int** | total number of users for a particular query |
**users** | [**\OpenAPI\Client\Model\ListPaginatedUsersItem[]**](ListPaginatedUsersItem.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
