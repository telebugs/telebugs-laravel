# Telebugs for Laravel

[![Package Version](https://poser.pugx.org/telebugs/telebugs-laravel/v/stable)](https://packagist.org/packages/telebugs/telebugs-laravel)

Simple error monitoring for developers. Monitor production errors in real-time
and get them reported to Telegram with Telebugs.

- [Official Documentation](https://telebugs.com/docs/integrations/laravel)
- [FAQ](https://telebugs.com/faq)
- [Telebugs News](https://t.me/TelebugsNews)
- [Telebugs Community](https://t.me/TelebugsCommunity)

## Introduction

Any Laravel application can be integrated with [Telebugs](https://telebugs.com)
using the
[`telebugs-laravel`](https://packagist.org/packages/telebugs/telebugs-laravel)
package. The package is designed to be simple and easy to use. It integrates the
[`telebugs/telebugs`](https://packagist.org/packages/telebugs/telebugs) package
with Laravel applications, so that any unhandled error occurring in your app
will be reported to Telebugs.

## Installation

For the integration details, please refer to the
[Telebugs documentation](https://telebugs.com/docs/integrations/laravel).

## Laravel support policy

Telebugs for Laravel supports the following Laravel versions:

- Laravel 8.x+
- PHP 8.1+

If you need support older Laravel versions, please contact us at
[help@telebugs.com](mailto:help@telebugs.com).

## Development

After checking out the repo, run `composer install` to install dependencies.
Then, run `composer test` to run the tests.

To check the code with PHPStan, run `composer phpstan`.

To release a new version, simply push a new tag to the repository. Packagist
will automatically update the package.

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/telebugs/telebugs-laravel.
