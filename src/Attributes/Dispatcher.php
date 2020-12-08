<?php
declare(strict_types=1);

namespace App\Attributes;

use JetBrains\PhpStorm\Pure;

class Dispatcher
{
    private ListenersResolver $listenersResolver;
    private array $subscribers = [];
    private array $listeners = [];

    #[Pure]
    public function __construct()
    {
        $this->listenersResolver = new ListenersResolver();
    }

    public function setSubscribers(array $subscribers)
    {
        $this->subscribers = $subscribers;
    }

    public function register()
    {
        foreach ($this->subscribers as $subscriber) {
            $this->listenersResolver->setSubscriber($subscriber);
            foreach ($this->listenersResolver->resolve() as [$event, $listener]) {
                $this->listeners[$event][] = $listener;
            }
        }
    }

    public function dispatch(string $event, mixed $object = null): void
    {
        if (!$this->isListenEvent($event)) {
            return;
        }

        $this->executeAllListeners($event, $object);
    }

    private function isListenEvent(string $event): bool
    {
        return isset($this->listeners[$event]);
    }

    private function executeAllListeners(string $event, mixed $object): void
    {
        foreach ($this->listeners[$event] as $callback) {
            call_user_func($callback, $object);
        }
    }
}
