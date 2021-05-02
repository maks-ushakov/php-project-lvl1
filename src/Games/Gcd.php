<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\generateNumber;

function rule(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function game(): array
{
    $first = generateNumber();
    $second = generateNumber();

    $question = "{$first} {$second}";

    $correct = gcd($first, $second);

    return [$question, $correct];
}

function gcd(int $first, int $second): int
{
    if ($second > 0) {
        return gcd($second, $first % $second);
    } else {
        return abs($first);
    }
}
