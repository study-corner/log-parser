<?php
declare(strict_types=1);

namespace App\Attributes;

class ListenersResolver
{
//    private mixed $subscriber;
//
//    public function setSubscriber(mixed $subscriber): self
//    {
//        $this->subscriber = $subscriber;
//
//        return $this;
//    }
//
//    public function resolve(): array
//    {
//        if (!$this->hasSubscriber()) {
//            throw new \RuntimeException('Set subscriber before resolve it');
//        }
//
//        $listeners = [];
//        $reflectionClass = new \ReflectionClass($this->subscriber);
//
//        foreach ($reflectionClass->getMethods() as $method) {
//            $attributes = $method->getAttributes(ListensTo::class);
//            foreach ($attributes as $attribute) {
//                $listensTo = $attribute->newInstance();
//                $callback = [$this->subscriber, $method->getName()];
//                $listeners[] = [$listensTo->getEvent(), $callback];
//            }
//        }
//
//        $this->clearSubscriber();
//
//        return $listeners;
//    }
//
//    private function clearSubscriber()
//    {
//        $this->subscriber = null;
//    }
//
//    private function hasSubscriber(): bool
//    {
//        return null !== $this->subscriber;
//    }
}
