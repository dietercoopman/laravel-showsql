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

        Builder::macro('showSql', function () {
            $showSql = new ShowSql($this);

            return $showSql->getBuilder();
        });
    }
}
