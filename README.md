# A Laravel package to log the current sql to your favourite debug tool

## Examples 

```php 

    DB::table('menus')->where('id', '=', 10)->showSql()->get();

    Menu::showSql()->get();

    Menu::whereId(1)->showSql()->get();
```

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
