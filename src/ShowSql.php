<?php

namespace Dietercoopman\Showsql;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Log;

class ShowSql
{
    private string       $sql;
    private $builder;

    /**
     * Combine the query and the bindings into a rendered
     * sql statement that can be passed to any chosen output
     * @param mixed $builder
     * @param null $callback
     */
    public function __construct($builder, $callback = null)
    {
        $this->sql = $this->combineSqlAndBindings($builder);

        if ($callback) {
            $callback($this->sql);
        } else {
            $this
                ->toTelescope()
                ->toLog()
                ->toRay()
                ->toClockwork()
                ->toDebugbar()
                ->toBrowser();
        }

        $this->builder = $builder;
    }

    /**
     * @return QueryBuilder
     */
    public function getBuilder(): QueryBuilder
    {
        return $this->builder;
    }

    /**
     * @return $this
     */
    private function toTelescope(): self
    {
        if (config('showsql.to.telescope')) {
            dump($this->sql);
        }

        return $this;
    }

    /**
     * @return $this
     */
    private function toLog(): self
    {
        if (config('showsql.to.log')) {
            Log::info($this->sql);
        }

        return $this;
    }

    /**
     * @return $this
     */
    private function toRay(): self
    {
        if (config('showsql.to.ray') && function_exists('ray')) {
            ray($this->sql);
        }

        return $this;
    }

    /**
     * @return $this
     */
    private function toClockwork(): self
    {
        if (config('showsql.to.clockwork') && function_exists('clock')) {
            clock($this->sql);
        }

        return $this;
    }

    /**
     * @return $this
     */
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
            echo(nl2br($this->sql));
        }

        return $this;
    }

    /**
     * @param EloquentBuilder|QueryBuilder|string $query
     * @return string
     */
    private function combineSqlAndBindings($query): string
    {
        if (\is_string($query)) {
            return $query;
        }

        $bindings = $query->getConnection()->prepareBindings($query->getBindings());

        $sql = preg_replace_callback('/(?<!\?)\?(?!\?)/', function () use (&$bindings, $query) {
            $value = array_shift($bindings);

            switch ($value) {
                case null:
                    $value = 'null';

                    break;
                case is_bool($value):
                    $value = $value ? 'true' : 'false';

                    break;
                case is_numeric($value):
                    break;
                default:
                    $value = with($query->getConnection(), function ($connection) use ($value) {
                        return $connection->getPdo()->quote((string)$value);
                    });

                    break;
            }

            return $value;
        }, $query->toSql());

        return $sql;
    }
}
