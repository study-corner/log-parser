<?php
declare(strict_types=1);

namespace App\Attributes\Events;

class Event
{
    private string $context;

    public function __construct(string $context)
    {
        $this->context = $context;
    }

    public function getContext(): string
    {
        return $this->context;
    }
}