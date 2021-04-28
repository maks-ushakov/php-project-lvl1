<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\generateNumber;
use function Cli\prompt;
use function Cli\line;
use function Brain\Games\Dialog\showWrongMessage;

define('CALC_OPERATION_LIST', ['+', '-', '*']);

function rule(): string
{
    return 'What is the result of the expression?';
}

function game(): bool
{
    $first = generateNumber();
    $second = generateNumber();
    $operation = generateOperation();
    $question = "{$first} {$operation} {$second}";

    line('Question, %s', $question);
    $answer = (int) prompt('Your answer');

    $correct = getCorrect($first, $second, $operation);
    if ($answer !== $correct) {
        showWrongMessage($answer, $correct);
        return false;
    }
    line('Correct');
    return true;
}

function generateOperation(): string
{
    $index =  random_int(0, count(CALC_OPERATION_LIST) - 1);
    return CALC_OPERATION_LIST[$index];
}

function getCorrect(int $first, int $second, string $operation): int
{
    return apply($first, $second, $operation);
}

function apply(int $first, int $second, string $operation)
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
}
