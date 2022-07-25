## installer comes to Laravel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]


`installer` is a project installing package of `Laravel`.

## Install

Via Composer

```bash
composer require sudippalash/installer
```

#### Publish config file

You can publish the config file with:

```
php artisan vendor:publish --provider="Sudip\Installer\Providers\AppServiceProvider" --tag=config
```

This is the contents of the published config file `config/installer.php`:

```php
    return [
        /*
        |--------------------------------------------------------------------------
        | php
        |--------------------------------------------------------------------------
        |
        | PHP required a version for your system and required extensions that user needs to enable or install on the server.
        | 
        */

        'php' => [
            'require_version' => '7.3.0',
            'require_extension' => ['bcmath', 'ctype', 'fileinfo', 'gd', 'json', 'mbstring', 'openssl', 'PDO', 'tokenizer', 'xml'],
        ],

        /*
        |--------------------------------------------------------------------------
        | Direcotries Permissions
        |--------------------------------------------------------------------------
        |
        | Users need to assign minimum permission for these project folders.
        | 
        */
        'direcotries_permissions' => [
            'bootstrap/cache' => '775',
            'storage/app' => '775',
            'storage/framework' => '775',
            'storage/logs' => '775',
        ],
        
        /*
        |--------------------------------------------------------------------------
        | env
        |--------------------------------------------------------------------------
        |
        | Set your default .env value. The form will show those data then the user can change it.
        | 
        */
        'env' => [
            'APP_NAME' => 'Laravel',
            'APP_URL' => url('/'),

            'LOG_CHANNEL' => 'daily',
            'FILESYSTEM_DRIVER' => 'public',

            'DB_HOST' => '127.0.0.1',
            'DB_PORT' => 3306,
            'DB_DATABASE' => 'laravel',
            'DB_USERNAME' => 'root',
            'DB_PASSWORD' => '',

            'MAIL_MAILER' => 'smtp',
            'MAIL_HOST' => 'smtp.mailgun.org',
            'MAIL_PORT' => 587,
            'MAIL_USERNAME' => null,
            'MAIL_PASSWORD' => null,
            'MAIL_ENCRYPTION' => 'tls',
            'MAIL_FROM_ADDRESS' => null,
            'MAIL_FROM_NAME' => 'Laravel',
        ],
    ];
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sudippalash/installer?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sudippalash/installer?style=flat-square
[ico-license]: https://img.shields.io/github/license/sudippalash/installer?style=flat-square
[link-packagist]: https://packagist.org/packages/sudippalash/installer
[link-downloads]: https://packagist.org/packages/sudippalash/installer
[link-author]: https://github.com/sudippalash
