<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\generateNumber;
use function Cli\prompt;
use function Cli\line;
use function Brain\Games\Dialog\showWrongMessage;

function rule(): string
{
    return 'What is the result of the expression?';
}

function game(): bool
{
    $first = generateNumber();
    $second = generateNumber();

    $question = "{$first} {$second}";

    line('Question, %s', $question);
    $answer = (int) prompt('Your answer');

    $correct = getCorrect($first, $second);
    if ($answer !== $correct) {
        showWrongMessage($answer, $correct);
        return false;
    }
    line('Correct');
    return true;
}

function getCorrect(int $first, int $second): int
{
    return gcd($first, $second);
}

function gcd(int $first, int $second): int
{
    if ($second > 0) {
        return gcd($second, $first % $second);
    } else {
        return abs($first);
    }
}
