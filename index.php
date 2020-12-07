<?php

require __DIR__ . '/vendor/autoload.php';

use App\Attributes\Dispatcher;
use App\Attributes\Events\ProductCreated;
use App\Attributes\Events\ProductDeleted;
use App\Attributes\Output;
use App\Attributes\ProductSubscriber;

$productSubscriber = new ProductSubscriber(new Output());

$dispatcher = new Dispatcher();
$dispatcher->setSubscribers([$productSubscriber]);
$dispatcher->register();

$event = new ProductCreated('Item was created');
$dispatcher->dispatch(ProductCreated::class, $event);

$event = new ProductDeleted('Item was deleted');
$dispatcher->dispatch(ProductDeleted::class, $event);