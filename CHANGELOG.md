# Changelog

All notable changes to this project will be documented in this file.

## Unreleased

## [0.5.0](https://github.com/passageidentity/passage-php/compare/v0.4.0...v0.5.0) (2024-12-12)


### Features

* add new classes for PassageUser, CreateUserArgs, and UpdateUserArgs ([#90](https://github.com/passageidentity/passage-php/issues/90)) ([7afac85](https://github.com/passageidentity/passage-php/commit/7afac8582143b00228224045ebd49b437b29366b))
* add parameter guards ([#89](https://github.com/passageidentity/passage-php/issues/89)) ([9317085](https://github.com/passageidentity/passage-php/commit/9317085318c51c0c4369da52378ee1db39395fd3))
* adds audience validation when validating a jwt ([#87](https://github.com/passageidentity/passage-php/issues/87)) ([1700bce](https://github.com/passageidentity/passage-php/commit/1700bce2cf5de8c16f992b098e180715cd3f67c9))
* adds new classes and method signatures ([#86](https://github.com/passageidentity/passage-php/issues/86)) ([308894c](https://github.com/passageidentity/passage-php/commit/308894cd8966f4e40e533ad964e4cfaea3dbb5c3))
* **codegen:** create magic link request fields are now optional ([#88](https://github.com/passageidentity/passage-php/issues/88)) ([90fb5e3](https://github.com/passageidentity/passage-php/commit/90fb5e364bd176147b5fe814cb30fb386363e0a9))


### Bug Fixes

* adds passage-version header to all api calls ([#69](https://github.com/passageidentity/passage-php/issues/69)) ([0e98725](https://github.com/passageidentity/passage-php/commit/0e987251f989907750d6ead7608d302fd5e38ee7))


### Miscellaneous Chores

* update all dependencies ([#84](https://github.com/passageidentity/passage-php/issues/84)) ([6a1759e](https://github.com/passageidentity/passage-php/commit/6a1759e5fde9ad8c8d1c32e5b908d05e5fd24a1f))

## [0.4.0] - 2024-03-21

### Added

- Update to the new README template, updated license, updated metadata in composer.json

### Added

- `Passage-Version` header added to all API requests

## [0.4.0] - 2024-03-21

### Added

- `GetUserByIdentifier` method has been added
- `ListPaginatedUsersItem` model has been added

## [0.3.0] - 2024-01-30

### Added

- `AppleUserSocialConnection` model has been added

### Changed

- `UserEventInfo` has been renamed to `UserRecentEvent`
- Docs have been moved to `/docs`
- `GithubSocialConnection` has been renamed to `GithubUserSocialConnection`
- `GoogleSocialConnection` has been renamed to `GoogleUserSocialConnection`

## [0.2.1] - 2023-11-15

### Added

- Support for Github and Google login.
- Github action to run tests.

### Changed

- `vlucas/phpdotenv` is now a dev dependancy.
- API auth method name changes. 

## [0.1.1] - 2023-11-15

### Added

- Wrap generated routes to no longer require app id on every function call.


## [0.0.1] - 2023-09-12

### Added

- Created the PHP SDK.
