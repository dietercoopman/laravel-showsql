<?php

namespace Dietercoopman\Showsql;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Log;

class ShowSql
{
    private string  $sql;
    private Builder $builder;

    public function __construct($builder)
    {
        $this->sql = vsprintf(str_replace('?', '%s', $builder->toSql()), collect($builder->getBindings())->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());

        $this
            ->toTelescope()
            ->toLog()
            ->toRay()
            ->toClockwork()
            ->toDebugbar()
            ->toBrowser();

        $this->builder = $builder;
    }

    public function getBuilder(): Builder
    {
        return $this->builder;
    }

    private function toTelescope(): self
    {
        if (config('showsql.to.telescope')) {
            dump($this->sql);
        }

        return $this;
    }

    private function toLog(): self
    {
        if (config('showsql.to.log')) {
            Log::info($this->sql);
        }

        return $this;
    }

    private function toRay(): self
    {
        if (config('showsql.to.ray') && function_exists('ray')) {
            ray($this->sql);
        }

        return $this;
    }

    private function toClockwork(): self
    {
        if (config('showsql.to.clockwork') && function_exists('clock')) {
            clock($this->sql);
        }

        return $this;
    }

    private function toDebugbar(): self
    {
        if (config('showsql.to.debugbar') && function_exists('debug')) {
            debug($this->sql);
        }

        return $this;
    }

    private function toBrowser(): self
    {
        if (config('showsql.to.browser')) {
            echo(nl2br($this->sql.PHP_EOL));
        }

        return $this;
    }

}
