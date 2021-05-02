<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\generateNumber;

function rule(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function game(): array
{
    $number = generateNumber();
    $correct = $number % 2 === 0 ? 'yes' : 'no';

    return [$number, $correct];
}
