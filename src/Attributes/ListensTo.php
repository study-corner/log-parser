<?php
declare(strict_types=1);

namespace App\Attributes;

use Attribute;

#[Attribute]
class ListensTo
{
    public function __construct(private string $event)
    {
    }

    public function getEvent()
    {
        return $this->event;
    }
}