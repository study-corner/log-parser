<?php
declare(strict_types=1);

namespace App\Tests\Attributes;

use App\Attributes\Dispatcher;
use App\Attributes\Events\ProductCreated;
use App\Attributes\Events\ProductDeleted;
use App\Attributes\Output;
use App\Attributes\ProductSubscriber;
use PHPUnit\Framework\TestCase;

class DispatcherTest extends TestCase
{
    public function testDispatchEvents(): void
    {
        $output = $this->createMock(Output::class);
        $output->expects(self::exactly(2))->method('print');
        $subscriber = new ProductSubscriber($output);

        $dispatcher = new Dispatcher();
        $dispatcher->setSubscribers([$subscriber]);
        $dispatcher->register();

        $dispatcher->dispatch(ProductCreated::class, new ProductCreated('Created'));
        $dispatcher->dispatch(ProductDeleted::class, new ProductDeleted('Deleted'));
    }
}