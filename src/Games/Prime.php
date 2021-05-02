<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\generateNumber;
use function Cli\prompt;
use function Cli\line;
use function Brain\Games\Dialog\showWrongMessage;

function rule(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function game(): bool
{
    $number = generateNumber();

    line('Question, %s', $number);
    $answer = prompt('Your answer');

    $correct = getCorrect($number);
    if ($answer !== $correct) {
        showWrongMessage($answer, $correct);
        return false;
    }
    line('Correct');
    return true;
}

function getCorrect(int $number)
{
    return isPrime($number) ? 'yes' : 'no';
}

function isPrime($number)
{
    if ($number == 1) {
        return false;
    }
    $limit = sqrt($number);
    for ($i = 2; $i < $limit; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
