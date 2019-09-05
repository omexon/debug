<?php

declare(strict_types=1);

namespace Tests\Omexon\Debug;

use Omexon\Debug\Dump;
use PHPUnit\Framework\TestCase;

class DumpTest extends TestCase
{
    /**
     * Test isCli().
     */
    public function testIsCLI(): void
    {
        $this->assertTrue(Dump::isCLI());
    }
}