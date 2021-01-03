<?php
declare(strict_types=1);

namespace App\Serialization;

use JMS\Serializer\SerializerBuilder;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Serialize
{
    public function create(): User
    {
        $wife = (new User())->setName('Rita')->setAge(31);
        $daughter1 = (new User())->setName('Rebeka')->setAge(12);
        $daughter2 = (new User())->setName('Elija')->setAge(4);
        $hobbies = ['chess', 'exercise', 'prograamming'];
        $user = (new User())
            ->setName('Kes')
            ->setAge(37)
            ->setHobbies($hobbies);
        $user
            ->addFamilyMember($wife)
            ->addFamilyMember($daughter1)
            ->addFamilyMember($daughter2);

//        $serializer = SerializerBuilder::create()
//            ->setCacheDir('/var/www/plain-sandbox/var/cache')
//            ->build();

        $encoders = [new XmlEncoder()];
        $objectNormalizer = new ObjectNormalizer();
        $normalizers = [$objectNormalizer];
        $serializer = new Serializer($normalizers, $encoders);

        $user = $serializer->deserialize($this->getSymfonyXml(), User::class, 'xml');

        return $user;
    }

    private function getJmsXml(): string
    {
        return <<<XML
<user>
    <name>Kes</name>
    <age>37</age>
    <hobbies>
        <entry>chess</entry>
        <entry>exercise</entry>
        <entry>prograamming</entry>
    </hobbies>
    <family>
        <entry>
            <name>Rita</name>
            <age>31</age>
            <hobbies/>
            <family/>
        </entry>
        <entry>
            <name>Rebeka</name>
            <age>12</age>
            <hobbies/>
            <family/>
        </entry>
        <entry>
            <name>Elija</name>
            <age>4</age>
            <hobbies/>
            <family/>
        </entry>
    </family>
</user>
XML;
    }

    private function getSymfonyXml(): string
    {
        return <<<XML
<response>
    <name>Kes</name>
    <age>37</age>
    <hobbies>chess</hobbies>
    <hobbies>exercise</hobbies>
    <hobbies>prograamming</hobbies>
    <family>
        <name>Rita</name>
        <age>31</age>
        <hobbies/>
        <family/>
    </family>
    <family>
        <name>Rebeka</name>
        <age>12</age>
        <hobbies/>
        <family/>
    </family>
    <family>
        <name>Elija</name>
        <age>4</age>
        <hobbies/>
        <family/>
    </family>
</response>
XML;

    }
}
