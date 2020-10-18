<?php

use App\Calculation\Add;
use App\Calculation\Sub;

require __DIR__ . '/vendor/autoload.php';

$add = new Add(3, 5);
$sub = new Sub(9, 3);

var_dump($add->result());
var_dump($sub->result());