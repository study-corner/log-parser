<?php

namespace App\Calculation;

class Sub
{
    private $first;
    private $second;

    public function __construct(int $first, int $second)
    {
        $this->first = $first;
        $this->second = $second;
    }

    public function result()
    {
        return $this->first - $this->second;
    }
}
