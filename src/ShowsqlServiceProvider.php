<?php

namespace Dietercoopman\Showsql;

use Illuminate\Database\Query\Builder;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ShowsqlServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('showsql')
            ->hasConfigFile();

        Builder::macro('showSql', function ($callback) {
            $showSql = new ShowSql($this, $callback);

            return $showSql->getBuilder();
        });
    }
}
