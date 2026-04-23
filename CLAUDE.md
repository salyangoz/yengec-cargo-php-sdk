# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this package is

`yengec/cargo` (namespace `Yengec\Cargo\`) is a thin PHP client SDK for the sibling **`yengec-cargo`** Node.js service, which itself is a unified HTTP facade over ~17 real cargo carriers (Yurtici, MNG, UPS, Aras, PTT, Sürat, Sendeo, Hepsijet, Fedex, DHL, UPS Global, Amazon EasyShip, …). **This SDK does not talk to any carrier directly** — it only serializes requests, POSTs them to the Node service, and maps the envelope response back into typed objects. Carrier-specific transport, auth, and validation all live in `yengec-cargo`, not here.

The main consumer is `yengec-api` (the Laravel monolith), which instantiates `Client` per request.

## Commands

No linter, static analyzer, or test suite is configured. The only workflow commands are Composer:

```bash
composer install             # install deps (php >=7.4, guzzlehttp/guzzle ^7.8, nesbot/carbon ^2.71)
composer dump-autoload       # after adding new classes under src/
php examples/create-one.php  # smoke-test any flow against a running cargo service; needs `setBaseUrl` override
```

The `examples/` directory (`create-one.php`, `query-one.php`, `cancel.php`, `test.php`) doubles as runnable integration checks — each sets `$requestConfig->setBaseUrl('http://cargo-service')` to point at a local Node service instead of production.

## Architecture

### Single entry point: `Client` (static methods only)

`src/Client.php` exposes the full SDK surface as static methods: `test`, `createOne`, `queryOne`, `cancel`, `invoice`. **The SDK is single-shipment only** — batch `create`/`query` were removed, so every flow is one order per HTTP call. Each method builds the matching `Request`, calls `send()`, and wraps the result in a `Response` subclass. Every call is funnelled through `Client::withHandler(Closure)`, which is the **single place** that translates Guzzle `ClientException` into typed SDK exceptions by reading the service's `meta.code` field:

| `meta.code` from service    | SDK exception              |
|-----------------------------|----------------------------|
| `VALIDATION_ERROR`          | `BadRequestException`      |
| `INVALID_SERVICE_CONFIG`    | `ServiceConfigException`   |
| `INVALID_ADDRESS`           | `InvalidAddressException`  |
| `SERVICE_EXCEPTION`         | `ServiceException`         |
| anything else               | `InvalidRequestException`  |

A non-JSON / malformed body throws `InvalidResponseException` from `Response::__construct`. When adding a new error class, wire it into this switch — nothing else dispatches exceptions.

### Request layer (`src/Requests/`)

- `Request` (abstract) owns the Guzzle client. `BASE_URI` = `https://cargo.yengec.co/` (live) / `TEST_BASE_URI` = `https://cargo-test.yengec.co/` (test), chosen by `RequestConfig::mode` unless overridden by `RequestConfig::setBaseUrl()`. Every concrete subclass defines a `PATH` constant; `send()` always POSTs JSON to `BASE_URI + getPath()`.
- Concrete endpoints:
  - `TestRequest` → `shipment/test`
  - `CreateOneRequest` → `shipment` (single `Order`)
  - `QueryOneRequest` → `shipment/{code}` (GET-style lookup via POST, code appended to PATH)
  - `CancelRequest` → `shipment/{code}/cancel`
  - `InvoiceRequest` → `shipment/{code}/invoice`
- `Request::toArray()` always emits `{service, mode, config, language, log}`; subclasses `array_merge` their payload on top (e.g. `CreateOneRequest` adds `order`).
- `RequestConfig` carries mode / language / service / `Config` plus optional `baseUrl` and Guzzle `HandlerStack`. Passing a handler auto-enables `log=true` — this is how the caller pipes Guzzle middleware (e.g. a logger) into every request.

### Per-carrier credentials: `Config`

`src/Requests/Config.php` is a credential bag keyed by carrier constant (`SERVICE_*`: `yurtici`, `mng`, `ups`, `aras`, `surat`, `ptt`, `ups-global`, `amazon-easy-ship`, `sendeo`, `hepsijet`, `fedex`, `dhl`, `dhl-e-commerce`). Every carrier has its own `setX()` / `getX()` with a **carrier-specific argument list** — Yurtici/MNG take just `username+password`, UPS adds `userCode`, PTT adds `paymentAccountId`, Sürat adds `createPassword`, Fedex takes 5 fields (separate track/create creds + userCode), Hepsijet takes `accessToken+warehouseId+companyName+companyCode+companyAddressId`, EasyShip takes Amazon's `sellerId+marketplaceId+refreshToken`, DHL eCommerce takes `username+password+clientId+clientSecret`, etc. `$config->get($service)` returns the raw array to the service under the `config` key.

**Adding a new carrier**: add a `SERVICE_*` const and matching `setX()`/`getX()` pair that mirrors exactly what the Node service's adapter at `yengec-cargo/src/services/shipment/<carrier>/` expects — the SDK does not validate these fields, so a mismatch surfaces as an `INVALID_SERVICE_CONFIG` (→ `ServiceConfigException`) or silently wrong behavior at runtime.

### DTO payloads (`src/Requests/Create/`)

Plain constructor-assigned value objects, each with a `toArray()` that emits **snake_case** keys for the wire:

- `Create\Order` (30+ fields, most nullable) — the big one; `toArray()` hardcodes the JSON shape the service expects, including the legacy duplicate key `neighbourhood`/`neighborhood`.
- `Create\OrderItem`, `Create\OrderSender`, `Create\Billing`, `Create\WareHouse` — nested under `Order`.
- `OrderItemCollection` — array wrapper with `add()` + `toArray()` that maps each item through its own `toArray()`. It is the **only** surviving collection (the batch `OrderCollection`/`Query\OrderCollection` were removed alongside `Client::create` / `Client::query`).

Constructors are **positional** with many optional tail parameters; named-argument invocations in `Readme.md` do not always match the positional order in `examples/*.php`. When editing `Order` or its DTOs, treat `toArray()` as the contract — the field names there must match what `yengec-cargo` consumes.

### Response layer (`src/Responses/`)

- `Response` expects an envelope of shape `{meta: {code, message}, data: {...}}` and exposes `getCode()` / `getMessage()` / `getBody()`.
- `CreateOneResponse` / `QueryOneResponse` project `data` into a single `Responses\Order\Order` DTO with `identity, status, message, error_code, tracking_code, tracking_url, label, receipt`.

## Cross-repo conventions

- PHP `>=7.4` (promoted-property and named-argument syntax from the README requires 8.0+ on the consumer side, but the SDK itself compiles on 7.4 — do not add 8.x-only syntax to `src/`).
- Code, comments, commit messages are English (workspace-wide rule).
- Published as `yengec/cargo` on Packagist and pulled in by `yengec-api` via Composer; bumps to DTO shapes are breaking changes for the monolith, so keep `toArray()` keys stable unless the matching `yengec-cargo` adapter has already been updated.
