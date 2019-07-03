# A laravel facade for the ipstack.com API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/arimolzer/ipstack-finder.svg?style=flat-square)](https://packagist.org/packages/arimolzer/ipstack-finder)
[![Build Status](https://img.shields.io/travis/arimolzer/ipstack-finder/master.svg?style=flat-square)](https://travis-ci.org/arimolzer/ipstack-finder)
[![Quality Score](https://img.shields.io/scrutinizer/g/arimolzer/ipstack-finder.svg?style=flat-square)](https://scrutinizer-ci.com/g/arimolzer/ipstack-finder)
[![Total Downloads](https://img.shields.io/packagist/dt/arimolzer/ipstack-finder.svg?style=flat-square)](https://packagist.org/packages/arimolzer/ipstack-finder)

This Laravel 5.8 package provides a simple to use facade to request data from the [ipstack.com](https://ipstack.com) geolocation API. 

## Installation

You can install the package via composer:

```bash
composer require arimolzer/ipstack-finder
```

The package will be immediately available thanks to Laravel auto discovery.

## Configuration

Before making any requests however, you'll need to provide an [ipstack.com](https://ipstack.com) API key. You can sign up for a free key [on their website](https://ipstack.com/product). 

The best way to set the API key is by assigning the `IPSTACK_API_KEY` environmental variable in your `.env` file. Alternatively, you can publish the packages config file to your application and edit the  it directly.

Optionally, you can also set a `IPSTACK_DEFAULT_LANGUAGE` environmental variable, which will update the default response language. For language options, see the [API documentation](https://ipstack.com/documentation#language).

If you would like to publish the config files, run the below artisan command:
```bash
php artisan vendor:publish --provider="Arimolzer\IPStackFinder\IPStackFinderServiceProvider"
```

## Usage

Once the package is installed, you can call the facade by using the IPFinder facade:

``` php
/** @var array $data */
$data = IPFinder::get('8.8.8.8');
```

Currently the only available method is `IPFinder::get(string $ip)`. 

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email ari.molzer@molzertech.com instead of using the issue tracker.

## Credits

- [Ari Molzer](https://github.com/arimolzer)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https//laravelpackageboilerplate.com).:
