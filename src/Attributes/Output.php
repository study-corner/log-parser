<?php
declare(strict_types=1);

namespace App\Attributes;

use App\Attributes\Events\Event;

class Output
{
    public function print(Event $event)
    {
        echo $event->getContext() . PHP_EOL;
    }
}