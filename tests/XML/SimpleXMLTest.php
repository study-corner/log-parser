<?php
declare(strict_types=1);

namespace App\Tests\XML;

use App\XML\SimpleXML;
use PHPUnit\Framework\TestCase;

class SimpleXMLTest extends TestCase
{
    public function testParse()
    {
        $simpleXml = new SimpleXML();
        $simpleXml->parse();
    }
}