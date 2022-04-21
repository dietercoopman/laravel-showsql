<?php

namespace Dietercoopman\Showsql;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;

class ShowsqlServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/showsql.php' => config_path('showsql.php'),
        ], 'showsql-config');

        Builder::macro('showSql', function ($callback = null) {
            $showSql = new ShowSql($this, $callback);

            return $showSql->getBuilder();
        });
    }
}
