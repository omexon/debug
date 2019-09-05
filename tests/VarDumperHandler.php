<?php

declare(strict_types=1);

namespace Tests\Omexon\Debug;

use Symfony\Component\VarDumper\VarDumper;

class VarDumperHandler
{
    /** @var mixed */
    private static $value;

    /**
     * Enable.
     */
    public static function enable(): void
    {
        self::$value = null;
        VarDumper::setHandler(function ($value): void {
            self::$value = $value;
        });
    }

    /**
     * Disable.
     */
    public static function disable(): void
    {
        VarDumper::setHandler(null);
    }

    /**
     * Value.
     *
     * @return mixed
     */
    public static function value()
    {
        return self::$value;
    }
}