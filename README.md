# Password Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/juststeveking/password-generator.svg?style=flat-square)](https://packagist.org/packages/juststeveking/password-generator)
[![Test Suite](https://github.com/juststeveking/password-generator/actions/workflows/tests.yml/badge.svg)](https://github.com/juststeveking/password-generator/actions/workflows/tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/juststeveking/password-generator.svg?style=flat-square)](https://packagist.org/packages/juststeveking/password-generator)
<!--delete-->

**Disclaimer**. This is not intended for use in a production environment to create your passwords. My use case for this is to actually generate one off use codes such as One Time Pass Codes. This is not the most secure as the list of words is quite small, and will leave you open to a potential dictionary attack.

## Installation

You can install the package via composer:

```bash
composer require juststeveking/password-generator
```

If you are using Laravel, you can publish the config file with:

```bash
php artisan vendor:publish --tag="password-generator-config"
```

## Set up - Laravel

To set this package up, you can replace the words within the config file with those of your own choosing. Then you are ready to go.

## Usage

### Using the Facade in Laravel

Call the facade directly to resolve the Password Generator from the container and call the static methods.

```php
use JustSteveKing\PasswordGenerator\Facades\Generator;

// Generate a standard password
$password = Generator::generate(); // example 'strong-car-fast-snail'

// Generate a "secure" password
$password = Generator::generateSecure(); // example 'str0ng-c4r-f4st-sn41l'
```

### Without the Facade in Laravel

Inject the contract into the constructor, and call either "generate" or "generateSecure" depending on your use case.

```php
use JustSteveKing\PasswordGenerator\Contracts\GeneratorContract;
use Illuminate\Http\JsonResponse;

class GeneratePasswordController
{
    public function __construct(
        private readonly GeneratorContract $generator,
    ) {}
    
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(
            data: [
                'password' => $this->generator->generate(), // or generateSecure() for "secure" passwords.
            ],
        );
    }
}
```

### Using outside of Laravel

If you have a DI container all you will need to do is resolve the class using the instance. Be mindful that you will need to set up your own container instructions and load in your own words list.

```php
// Once you have added this to your container, and injected
$password = $this->generator->generate();

// Or like the Laravel implementation, generate a secure password
$password = $this->generator->generateSecure();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Steve McDougall](https://github.com/juststeveking)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
