<?php

declare(strict_types=1);

namespace Tests\Omexon\Debug\Base;

use Omexon\Debug\Dump;
use PHPUnit\Framework\TestCase;
use Tests\Omexon\Debug\HelperClasses\ValueHelperBase;

class ValueBaseTest extends TestCase
{
    /**
     * Test.
     */
    public function testConstructor(): void
    {
        $uses = [
            'file' => 'file',
            'line' => 'line',
            'function' => 'function.2'
        ];
        $valueHelperBase = new ValueHelperBase('test', 'function.1', $uses);
        d_show_uses();
        $checkUses = $valueHelperBase->getUses();
        $this->assertEquals('function.1(value)->function.2() in [file:line]', $checkUses);
        Dump::showUses(false);
    }

    /**
     * Test getUses().
     */
    public function testGetUses(): void
    {
        $uses = [
            'file' => 'file',
            'line' => 'line',
            'function' => 'function.2'
        ];
        $valueHelperBase = new ValueHelperBase('test', 'function.1', $uses);
        $checkUses = $valueHelperBase->getUses();
        $this->assertNull($checkUses);
    }
}