<?php
declare(strict_types=1);

namespace App\Attributes;

class Dispatcher
{
    private array $subscribers = [];
    private array $listeners = [];

    public function setSubscribers(array $subscribers)
    {
        $this->subscribers = $subscribers;
    }

    public function register()
    {
        foreach ($this->subscribers as $subscriber) {
            foreach ($this->resolveListeners($subscriber) as [$event, $listener]) {
                $this->listeners[$event][] = $listener;
            }
        }
    }

    public function dispatch(string $event, mixed $object = null): void
    {
        if (!isset($this->listeners[$event])) {
            return;
        }

        foreach ($this->listeners[$event] as $callback) {
            call_user_func($callback, $object);
        }
    }

    private function resolveListeners($subscriber): array
    {
        $reflectionClass = new \ReflectionClass($subscriber);
        $listeners = [];

        foreach ($reflectionClass->getMethods() as $method) {
            $attributes = $method->getAttributes(ListensTo::class);
            foreach ($attributes as $attribute) {
                $listensTo = $attribute->newInstance();
                $listeners[] = [$listensTo->getEvent(), [$subscriber, $method->getName()]];
            }
        }

        return $listeners;
    }
}
