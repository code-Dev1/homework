<?php

function createOperation($operation)
{
    // return $operation;
    switch ($operation) {
        case 'add':
            return function (float $num1 ,float $num2){ return $num1 + $num2; };
        case 'subtract':
            return function (float $num1 ,float $num2){ return $num1 - $num2; };
        case 'multiply':
            return function (float $num1 ,float $num2){ return $num1 * $num2; };
        case 'divide':
            return function (float $num1 ,float $num2){ return ($num2 != 0) ? $num1 / $num2 : "Divide by zero error"; };
    }
}
$operation = createOperation('add');
$operation(4,5);