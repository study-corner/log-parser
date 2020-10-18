<?php

namespace App\Tests\Calculation;

use App\Calculation\Add;
use PHPUnit\Framework\TestCase;

class AddTest extends TestCase
{
    public function testAddition()
    {
        $add = new Add(2, 3);
        $this->assertEquals(5, $add->result());
    }
}