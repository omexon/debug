<?php

declare(strict_types=1);

namespace Tests\Omexon\Debug\Renderers;

use Omexon\Debug\Renderers\Value;
use PHPUnit\Framework\TestCase;
use Tests\Omexon\Debug\VarDumperHandler;

class ValueTest extends TestCase
{
    /**
     * Test display.
     */
    public function testDisplay(): void
    {
        VarDumperHandler::enable();

        $value = new Value('test', 'test');
        $value->display();

        VarDumperHandler::disable();
        $this->assertEquals('test', VarDumperHandler::value());
    }
}