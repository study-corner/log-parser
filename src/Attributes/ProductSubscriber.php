<?php
declare(strict_types=1);

namespace App\Attributes;

use App\Attributes\Events\ProductCreated;
use App\Attributes\Events\ProductDeleted;

class ProductSubscriber
{
    #[ListensTo(ProductCreated::class)]
    public function onProductCreated(ProductCreated $event)
    {
        $context = $event->getContext();
        var_dump($context);
    }

    #[ListensTo(ProductDeleted::class)]
    public function onProductDeleted(ProductDeleted $event)
    {
        $context = $event->getContext();
        var_dump($context);
    }
}
