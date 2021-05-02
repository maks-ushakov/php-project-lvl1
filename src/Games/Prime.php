<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\generateNumber;

function rule(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function game(): array
{
    $number = generateNumber();
    $correct = isPrime($number) ? 'yes' : 'no';

    return [$number, $correct];
}

function isPrime($number): bool
{
    if ($number == 1) {
        return false;
    }
    $limit = sqrt($number);
    for ($i = 2; $i <= $limit; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
