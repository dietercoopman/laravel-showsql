![Downloads](https://img.shields.io/packagist/dt/dietercoopman/laravel-showsql.svg?style=flat-square)


![showsql](https://banners.beyondco.de/Laravel%20showsql.png?theme=light&packageManager=composer+require&packageName=dietercoopman%2Flaravel-showsql&pattern=architect&style=style_1&description=giving+attention+to+that+one+sql&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

# Laravel showsql

A Laravel package to output a specific sql to your favourite debugging tool, your browser or your log file.

## Use case

You often want to draw the attention and look into one single sql while you are developing.  You can look up your sql in your favourite debugging
tool in the sql tab , but most of the time your sql is not the only sql executed ... So the searching begins.  With this package you can
add `showSql()` to your QueryBuilder and the single sql will be outputted to the logging of your debug tool.

The supported log output is Laravel Telescope, Laravel Log, Ray, Clockwork, Laravel Debugbar and your browser.  By default, showSql will try to
<<<<<<< Updated upstream
log to Ray, Clockwork or the Laravel Debugbar if one of them is installed.  If all installed it will be output to all.
=======
log to one Ray, Clockwork or the Laravel Debugbar if one of them is installed.  If all installed it will be output to all.
>>>>>>> Stashed changes
If you want to change this behaviour you can publish the config file and change it.

## Installation 

```shell
composer require dietercoopman/laravel-showsql --dev
```

## Configuration

You can publish the config file with the following command

```shell
php artisan vendor:publish --tag=showsql-config 
```

## Examples 

```php 
# With the Eloquent Builder
Menu::showSql()->get();

Menu::whereId(1)->showSql()->get();

Menu::whereHas('status')->showSql()->get();

# With the Query Builder
DB::table('menus')->where('id', '=', 10)->showSql()->get();

DB::table('menus')->join('statuses', 'statuses.id', '=', 'menus.status_id')
                 ->showSql()
                 ->get();

```

This is an example log output

![showsql example](example.png)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Dieter Coopman](https://github.com/dietercoopman)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
