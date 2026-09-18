# Changelog

All notable changes to this project are documented here. The format is based
on Keep a Changelog, and this project adheres to Semantic Versioning.

## [1.2.0] - 2026-09-18

### Added
- `Vdsina\Transport\TransportInterface` — minimal HTTP transport abstraction.
- `Vdsina\Transport\CurlTransport` — default cURL implementation; owns host,
  API version, scheme, timeout, User-Agent and extra cURL options.
- `Vdsina\Transport\Response` — immutable raw response DTO.
- `Vdsina\Transport\TransportException` — thrown on network/configuration
  failures; extends `ApiException`, so existing `catch (ApiException)` works.
- PHPUnit test suite (`tests/`), `phpunit.xml`, and `composer test` / `composer lint`
  scripts.

### Changed
- `Client` now takes a `TransportInterface` and a token:
  `new Client(new CurlTransport(), $token)`. Connection settings moved from the
  `Client` constructor to `CurlTransport`.
- Empty/204 responses now return `null` instead of failing JSON decoding.
- `Vdsina\ApiException` is no longer `final` (so `TransportException` can extend it).

## [1.1.0] - 2026-09-15

### Added
- `Client::VERSION` and `Client::DEFAULT_USER_AGENT` constants as the single
  source of the SDK version and the default User-Agent header.
- Transparent gzip/deflate response decompression (`CURLOPT_ENCODING`).
- Accurate PHPDoc array-shape types for every API response, matching the
  OpenAPI schema.

### Fixed
- `reinstallServer()` no longer sends an empty JSON array (`[]`) as the request
  body when called without optional arguments.
- `buildBaseUrl()` no longer appends the API version twice when the host already
  contains a path, and no longer produces a double slash for an empty version.
- `getLastResponse()` / `getLastHttpCode()` no longer expose stale data from a
  previous call after a transport-level failure or malformed JSON.
- Examples no longer fail when a list endpoint returns `null`.

### Changed
- A host that already contains a path is now used as the complete base URL
  (the version prefix is not appended).
- `ApiException` is now `final`; its public methods are no longer `final`.

## [1.0.0] - 2026-07-16

### Added
- Initial release: compact, dependency-free PHP SDK for the VDSina public API,
  built on `curl` + `json` only.
- `Vdsina\Client` covering the public API surface: account, helpers, SSH keys,
  ISO, servers, backups, backup schedules, local/additional/reserved IP
  addresses, PTR records, DNS and billing.
- `Vdsina\ApiException` carrying the HTTP status code and the parsed
  `status_msg` / `description` / `data` error fields.
