<?php

declare(strict_types=1);

namespace Omexon\Debug;

use Omexon\Debug\Base\ValueBase;
use Omexon\Debug\Renderers\Value;

class Dump
{
    /** @var ValueBase */
    private $renderer;

    /** @var mixed */
    private $values;

    /** @var string */
    private $function;

    /** @var string[] */
    private $uses;

    /** @var bool */
    private static $usesVisible = false;

    /**
     * Parse.
     *
     * @param mixed[] $values
     * @param string $function
     * @param string[] $uses
     */
    public function __construct(array $values, string $function, array $uses)
    {
        $this->values = $values;
        $this->function = $function;
        $this->uses = $uses;
    }

    /**
     * Show uses.
     *
     * @param bool $usesVisible
     */
    public static function showUses(bool $usesVisible = true): void
    {
        self::$usesVisible = $usesVisible;
    }

    /**
     * Do show uses.
     *
     * @return bool
     */
    public static function isUsesVisible(): bool
    {
        return self::$usesVisible;
    }

    /**
     * Is cli.
     *
     * @return bool
     */
    public static function isCLI(): bool
    {
        return PHP_SAPI === 'cli';
    }

    /**
     * Value.
     */
    public function value(): void
    {
        $this->execute(Value::class);
    }

    /**
     * Execute.
     *
     * @param string $class
     */
    private function execute(string $class): void
    {
        // Get uses.
        $uses = $this->uses;
        if (count($uses) >= 2) {
            reset($uses);
            $uses = current($uses);
        }

        // Execute renderer.
        foreach ($this->values as $value) {
            $this->renderer = new $class($value, $this->function, $uses);
            $this->renderer->display();
            $renderedUses = $this->renderer->getUses();
            if ($renderedUses !== null) {
                dump($renderedUses);
            }
        }
    }
}