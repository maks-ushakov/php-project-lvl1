<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\generateNumber;

function rule(): string
{
    return 'What number is missing in the progression?';
}

function game(): array
{
    $startNumber = generateNumber();
    $size = 5 + generateNumber(6);
    $commonDiff = generateNumber(10);
    $progression = generateProgression($size, $startNumber, $commonDiff);
    $hiddenIndex = generateNumber(count($progression)) - 1 ;

    $correct = (string) $progression[$hiddenIndex];
    $question = makeQuestion($progression, $hiddenIndex);

    return [$question, $correct];
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
