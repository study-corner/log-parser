<?php
declare(strict_types=1);

namespace App\XML;

use App\XML\Entity\Dependencies;
use App\XML\Entity\Package;
use App\XML\Entity\PackageClass;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

class SimpleXML
{
    public function parse()
    {
        $dir = realpath(__DIR__.'/../../build/pdepend');
        $xmlFile = $dir . '/dependency.xml';

        $xml = file_get_contents($xmlFile);
//        $simpleXml = simplexml_load_string($xml);

        $simpleXml = simplexml_load_file($xmlFile);
        $json = json_encode($simpleXml);
        $array = json_decode($json, true);

        $serializer = SerializerBuilder::create()
            ->setCacheDir('/var/www/plain-sandbox/var/cache')
            ->build();

        $packageClass = new PackageClass();

        $package = new Package();
        $package->setPackageName('PDepend');
        $package->addPackageClass($packageClass);


        $dependencies = new Dependencies();
        $dependencies->setGenerated('2021-01-02T13:37:28');
        $dependencies->setPdepend('@package_version@');
        $dependencies->addPackage($package);

        $xmlDependencies = $serializer->serialize($dependencies, 'xml');
        $xmlPackage = $serializer->serialize($package, 'xml');
    }

    public function dependenciesXML()
    {
        return <<<EOL
<?xml version="1.0" encoding="UTF-8"?>
<result>
    <generated><![CDATA[2021-01-02T13:37:28]]></generated>
    <pdepend><![CDATA[@package_version@]]></pdepend>
    <packages>
        <entry>
            <name><![CDATA[PDepend]]></name>
        </entry>
    </packages>
</result>
EOL;
    }
}
