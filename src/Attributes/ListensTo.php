<?php
declare(strict_types=1);

namespace App\Attributes;

use Attribute;

#[Attribute]
class ListensTo
{
    private string $event;

    public function __construct(string $event)
    {
        $this->event = $event;
    }

    public function getEvent()
    {
        return $this->event;
    }
}