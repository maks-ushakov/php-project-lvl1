<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\generateNumber;
use function Cli\prompt;
use function Cli\line;
use function Brain\Games\Dialog\showWrongMessage;

function rule(): string
{
    return 'What number is missing in the progression?';
}

function game(): bool
{
    $startNumber = generateNumber();
    $size = 5 + generateLimitedNumber(6);
    $commonDiff = generateLimitedNumber(10);
    $progression = generateProgression($size, $startNumber, $commonDiff);
    $hiddenIndex = generateLimitedNumber(count($progression)) - 1 ;

    $question = makeQuestion($progression, $hiddenIndex);

    line('Question, %s', $question);
    $answer = (int)prompt('Your answer');

    $correct = getCorrect($progression, $hiddenIndex);
    if ($answer !== $correct) {
        showWrongMessage($answer, $correct);
        return false;
    }
    line('Correct');
    return true;
}

function getCorrect(array $collection, int $index)
{
    return $collection[$index];
}

function generateLimitedNumber(int $maxNumber): int
{
    return  random_int(1, $maxNumber);
}

function makeQuestion($collection, $index): string
{
    $collection[$index] = '..';
    return implode(' ', $collection);
}

function generateProgression(int $size, int $start, int $diff): array
{
    $result = [];
    for ($i = 0; $i < $size; $i++) {
        $result[] = $start + $i * $diff;
    }
    return $result;
}
