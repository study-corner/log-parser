<?php
declare(strict_types=1);

namespace App\Serialization;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

class User
{
    /**
     * @Serializer\Type("string")
     */
    private $name;
    /**
     * @Serializer\Type("int")
     */
    private $age;
    /**
     * @Serializer\Type("array<string>")
     */
    private $hobbies = [];
    /**
     * @var ArrayCollection
     * @Serializer\Type("array<App\Serialization\User>")
     */
    private $family;

    public function __construct()
    {
        $this->family = new ArrayCollection();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getHobbies()
    {
        return $this->hobbies;
    }

    public function setHobbies(array $hobbies): self
    {
        $this->hobbies = $hobbies;

        return $this;
    }

    public function addFamilyMember(User $member): self
    {
        $this->family->add($member);

        return $this;
    }
}