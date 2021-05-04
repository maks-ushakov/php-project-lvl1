<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\generateNumber;

define('CALC_OPERATION_LIST', ['+', '-', '*']);

function rule(): string
{
    return 'What is the result of the expression?';
}

function game(): array
{
    $first = generateNumber();
    $second = generateNumber();
    $operation = generateOperation();

    $question = "{$first} {$operation} {$second}";
    $correct = (string) apply($first, $second, $operation);

    return [$question, $correct];
}

function generateOperation(): string
{
    $index =  random_int(0, count(CALC_OPERATION_LIST) - 1);
    return CALC_OPERATION_LIST[$index];
}

function apply(int $first, int $second, string $operation = '+'): int
{
    if ($operation == '+') {
        return $first + $second;
    }
    if ($operation == '-') {
        return $first - $second;
    }

    if ($operation == '*') {
        return $first * $second;
    }
    return $first + $second;
}
