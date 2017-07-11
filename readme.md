# Laravel Symlink Faker

Simple package created to help mitigate issues associated with symlinks during local development.

**Not intended for production environments.**

## Installation
Required the package with composer
```
composer require reaction/symlink-faker
```

Once the package is included, add the service provider to `config/app.php`
```
Reaction\SymlinkFaker\ServiceProvider::class
```

There is a package config included, to copy it to your local config use the following command.
```
php artisan vendor:publish --provider="Reaction\SymlinkFaker\ServiceProvider"
```

## Usage

To enable it you can use the `enable` config variable in `config/symlink-faker.php` or use the enviroment variable `SYMLINK_FAKER_ENABLED`

Once enabled it will watch your public route for the local filesystem and make them available publicly. It does this by passing the file through php, so it is not ideal for production but handy when developing locally.

You can set it to run on specific environments only with the `environments` array in the config. any environment listed while `enabled` is true will run it, otherwise it will not. If no environments are added to the array it will run in all environments.