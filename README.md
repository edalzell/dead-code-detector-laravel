[![Latest Version on Packagist](https://img.shields.io/packagist/v/edalzell/dead-code-detector-laravel.svg?style=flat-square)](https://packagist.org/packages/edalzell/dead-code-detector-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/edalzell/dead-code-detector-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/edalzell/dead-code-detector-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/edalzell/dead-code-detector-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/edalzell/dead-code-detector-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/edalzell/dead-code-detector-laravel.svg?style=flat-square)](https://packagist.org/packages/edalzell/dead-code-detector-laravel)

Two usage providers for [shipmonk/dead-code-detector](https://github.com/shipmonk-rnd/dead-code-detector), covering Laravel conventions its own providers do not: Eloquent trait hooks and `#[Scope]` attributes.

This is a PHPStan extension, not a Laravel package. There is no service provider and nothing to publish.

For [lorisleiva/laravel-actions](https://github.com/lorisleiva/laravel-actions), see [edalzell/dead-code-detector-laravel-actions](https://github.com/edalzell/dead-code-detector-laravel-actions).

## Installation

```bash
composer require --dev edalzell/dead-code-detector-laravel
```

With `phpstan/extension-installer` the extension registers itself. Without it, add one line:

```neon
includes:
    - vendor/shipmonk/dead-code-detector/rules.neon
    - vendor/edalzell/dead-code-detector-laravel/extension.neon
```

## What each extension does

**`EloquentTraitHooksUsageProvider`** — Eloquent invokes a trait's `boot{Trait}` and `initialize{Trait}` hooks reflectively. Shipmonk's Eloquent provider knows only `Model::boot` and `Model::booted`, so every hook a trait declares reads as dead.

**`EloquentScopeAttributeUsageProvider`** — a `#[Scope]` method is reached through the query builder, never called by name. Shipmonk's Eloquent provider recognises the older `scopeName()` convention only, so an attribute-declared scope reads as dead however many callers it has.

## Testing

```bash
composer test
```

The suite runs PHPStan over `tests/Fixtures` three times: once with the shipped `extension.neon`, and once per extension with that one service left out. Each run asserts the exact set of members reported dead, so removing any extension turns a test red with a named fixture rather than quietly changing nothing.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
