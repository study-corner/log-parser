<?php
declare(strict_types=1);

namespace App\Tests\Calculation;

use App\Calculation\Multiply;
use PHPUnit\Framework\TestCase;

class MultiplyTest extends TestCase
{
    public function testMultiply()
    {
        $multiply = new Multiply(2, 3);

        $this->assertEquals(6, $multiply->result());
    }
}