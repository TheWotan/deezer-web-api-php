# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2026-06-07

### Added
- 13 resource classes: `Album`, `Artist`, `Chart`, `Comment`, `Editorial`, `Episode`, `Genre`, `Playlist`, `Podcast`, `Radio`, `Search`, `Track`, `User`
- `Session` class for OAuth 2.0 authorization flow
- `DeezerRateLimitException` — thrown on HTTP 429, exposes `getRetryAfter(): int`
- Progressive backoff retry via `auto_retry` option: delays of 1, 2, 5, 10, 30, 60 seconds over 6 attempts
- `@auth none|required|optional` PHPDoc annotations on every method for IDE and documentation clarity
- Inline `@return object{...}` PHPStan-compatible shapes on all methods — field-level autocompletion in PhpStorm and VS Code without plugins
- `StaticTokenProvider` and `SessionTokenProvider` for `TokenProviderInterface`
- GitHub Actions CI with PHP 7.4, 8.1, 8.4 matrix
- Coveralls integration for coverage reporting
- 153 tests, 99.2% line coverage

### Changed
- `json_decode()` always returns `stdClass` — removed `return_assoc` option
- HTTP 429 detected before generic `>= 400` handler and throws `DeezerRateLimitException`

### Fixed
- Fixture IDs synced to real Deezer API responses

## [0.1.0] - 2021-05-27

- Initial dev release

[1.0.0]: https://github.com/TheWotan/deezer-web-api-php/releases/tag/v1.0.0
[0.1.0]: https://github.com/TheWotan/deezer-web-api-php/releases/tag/v0.1.0
