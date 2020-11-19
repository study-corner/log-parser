<?php
declare(strict_types=1);

namespace App\Tests\Serialization;

use App\Serialization\Serialize;
use PHPUnit\Framework\TestCase;

class SerializeTest extends TestCase
{
    public function testCreate()
    {
        $serialize = new Serialize();
        $response = $serialize->create();

        $this->assertTrue(true);
    }
}