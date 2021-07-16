# Limg PHP Client Package.

<img src="https://limg.app/i/gQHOGpS.png/500" alt="limg logo">

[![Latest Version on Packagist](https://img.shields.io/packagist/v/havenstd06/limg-php-client.svg?style=flat-square)](https://packagist.org/packages/havenstd06/limg-php-client)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/havenstd06/limg-php-client/run-tests?label=tests)](https://github.com/havenstd06/limg-php-client/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/havenstd06/limg-php-client/Check%20&%20fix%20styling?label=code%20style)](https://github.com/havenstd06/limg-php-client/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/havenstd06/limg-php-client.svg?style=flat-square)](https://packagist.org/packages/havenstd06/limg-php-client)

## Installation

You can install the package via composer:

```bash
composer require havenstd06/limg-php-client
```

## Usage

```php
use Havenstd06\Limg\Limg-PHP-Client\Limg;

$token = "abcdef1234";
Limg::setApiToken($token);

$img = Limg::upload('./images/test.png');

$getSuccess = $img->getSuccess(); // true || false
$getStatus = $img->getStatus(); // 200
$getTitle = $img->getTitle(); // "Image uploaded from Limg-PHP-Client"
$getDatetime = $img->getDatetime(); // "1626435783"
$getDate = $img->getDate(); // "2021-07-16 11:34:54"
$getType = $img->getType(); // "image/jpeg"
$getUserId = $img->getUserId(); // 2
$getUsername = $img->getUsername(); // "Havens"
$getState = $img->getState(); // 2
$getDeleteLink = $img->getDeleteLink(); // "https://limg.app/api/images/delete/xxxxxx"
$getPageLink = $img->getPageLink(); // "https://limg.app/i/xxxxxx"
$getLink = $img->getLink(); // "https://limg.app/i/xxxxxx.xxx"
```

More information on Limg's documentation [HERE](https://github.com/Havenstd06/Limg).

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Thomas](https://github.com/Havenstd06)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
