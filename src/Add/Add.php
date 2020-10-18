<?php

namespace App\Add;

class Add
{
    private $first;
    private $second;

    public function __construct(int $first, int $second)
    {
        $this->first = $first;
        $this->second = $second;
    }

    public function sum()
    {
        return $this->first + $this->second;
    }
}