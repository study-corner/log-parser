<?php

namespace App\Tests\Calculation;

use App\Calculation\Sub;
use PHPUnit\Framework\TestCase;

class SubTest extends TestCase
{
    public function testSub()
    {
        $sub = new Sub(5, 3);
        $this->assertEquals(2, $sub->result());
    }
}