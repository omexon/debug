<?php

declare(strict_types=1);

namespace Omexon\Debug\Renderers;

use Omexon\Debug\Base\ValueBase;

class Value extends ValueBase
{
    /**
     * Display.
     */
    public function display(): void
    {
        dump($this->value);
    }
}