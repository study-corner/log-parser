<?php
declare(strict_types=1);

namespace App\Attributes\Events;

class Event
{
    public function __construct(private string $context)
    {
    }

    public function getContext(): string
    {
        return $this->context;
    }
}