<?php

namespace Dietercoopman\Showsql;

class ShowSql
{

    private $sql;
    private $builder;

    public function __construct($builder)
    {

        $this->sql = vsprintf(str_replace('?', '%s', $builder->toSql()), collect($builder->getBindings())->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());

        $this->toRay()->toClockwork()->toDebugbar();

        $this->builder = $builder;

    }

    public function getBuilder()
    {
        return $this->builder;
    }

    private function toRay(): self
    {
        if (function_exists('ray')) {
            ray($this->sql);
        }

        return $this;

    }

    private function toClockwork(): self
    {

        if (function_exists('clock')) {
            clock($this->sql);
        }

        return $this;

    }

    private function toDebugbar(): self
    {

        if (function_exists('debug')) {
            debug($this->sql);
        }

        return $this;

    }

}
