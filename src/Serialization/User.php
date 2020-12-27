<?php
declare(strict_types=1);

namespace App\Serialization;

use JMS\Serializer\Annotation as Serializer;

class User
{
    /**
     * @Serializer\Type("string")
     */
    private string $name;
    /**
     * @Serializer\Type("int")
     */
    private int $age;
    /**
     * @Serializer\Type("array<string>")
     */
    private array $hobbies = [];
    /**
     * @Serializer\Type("array<App\Serialization\User>")
     */
    private array $family = [];

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
        $this->family[] = $member;

        return $this;
    }
}
