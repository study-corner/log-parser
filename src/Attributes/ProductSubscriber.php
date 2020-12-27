<?php
declare(strict_types=1);

namespace App\Attributes;

use App\Attributes\Events\ProductCreated;
use App\Attributes\Events\ProductDeleted;

class ProductSubscriber
{
    private Output $output;

    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    #[ListensTo(ProductCreated::class)]
    public function onProductCreated(ProductCreated $event)
    {
        $this->output->print($event);
    }

    #[ListensTo(ProductDeleted::class)]
    public function onProductDeleted(ProductDeleted $event)
    {
        $this->output->print($event);
    }
}
