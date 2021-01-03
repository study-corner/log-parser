<?php
declare(strict_types=1);

namespace App\XML\Entity;

use JMS\Serializer\Annotation as Serializer;

class Dependencies
{
    /**
     * @Serializer\Type("string")
     */
    private ?string $generated = null;
    /**
     * @Serializer\Type("string")
     */
    private ?string $pdepend = null;
    /**
     * @var Package[]
     * @Serializer\Type("array<App\XML\Entity\Package>")
     */
    private array $package = [];

    /**
     * @return string
     */
    public function getGenerated(): string
    {
        return $this->generated;
    }

    /**
     * @param string $generated
     */
    public function setGenerated(string $generated): void
    {
        $this->generated = $generated;
    }

    /**
     * @return string
     */
    public function getPdepend(): string
    {
        return $this->pdepend;
    }

    /**
     * @param string $pdepend
     */
    public function setPdepend(string $pdepend): void
    {
        $this->pdepend = $pdepend;
    }

    /**
     * @return array
     */
    public function getPackages(): array
    {
        return $this->package;
    }

    public function addPackage(Package $package): void
    {
        $this->package[] = $package;
    }
}