<?php

class Model
{
    private $attributes = [];
    protected static $table;

    public function __set($n, $v)
    {
        $this->attributes[$n] = $v;
    }

    public function __get($n)
    {
        if (array_key_exists($n, $this->attributes)) {
            return $this->attributes[$n];
        }

        return null;
    }

    public static function getTableName()
    {
        return static::$table;
    }
}
