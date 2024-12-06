# Changelog

All notable changes to this project will be documented in this file.

## Unreleased

## [0.5.0](https://github.com/passageidentity/passage-php/compare/v0.4.0...v0.5.0) (2024-12-06)


### Features

* adds new classes and method signatures ([#86](https://github.com/passageidentity/passage-php/issues/86)) ([308894c](https://github.com/passageidentity/passage-php/commit/308894cd8966f4e40e533ad964e4cfaea3dbb5c3))
* **codegen:** create magic link request fields are now optional ([#88](https://github.com/passageidentity/passage-php/issues/88)) ([90fb5e3](https://github.com/passageidentity/passage-php/commit/90fb5e364bd176147b5fe814cb30fb386363e0a9))


### Bug Fixes

* adds passage-version header to all api calls ([#69](https://github.com/passageidentity/passage-php/issues/69)) ([0e98725](https://github.com/passageidentity/passage-php/commit/0e987251f989907750d6ead7608d302fd5e38ee7))


### Miscellaneous Chores

* add dev container ([#77](https://github.com/passageidentity/passage-php/issues/77)) ([749e888](https://github.com/passageidentity/passage-php/commit/749e8886764886900d3534acb5fa07f643c69405))
* bootstrap releases for path: . ([#79](https://github.com/passageidentity/passage-php/issues/79)) ([575d1cc](https://github.com/passageidentity/passage-php/commit/575d1cccadbf30eb63907d4874c759374ae5f0c6))
* resolve linting errors and warnings per PSR-12 ([#83](https://github.com/passageidentity/passage-php/issues/83)) ([9b527e4](https://github.com/passageidentity/passage-php/commit/9b527e41b761f519f278f8313e8979fb6e54beef))
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
