<?php
declare(strict_types=1);

namespace App\Tests\Serialization;

use App\Serialization\Serialize;
use PHPUnit\Framework\TestCase;

class SerializeTest extends TestCase
{
    public function testCreate()
    {
        $this->markTestSkipped('Serializer not available for php 8');

        $serialize = new Serialize();
        $response = $serialize->create();

        $this->assertTrue(true);
    }
}