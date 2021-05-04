<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\generateNumber;

define('PROGRESSION_MIN_SIZE', 5);
define('PROGRESSION_RECOMEND_SIZE', 11);
define('PROGRESSION_MAX_COMMON_DIFF', 10);

function rule(): string
{
    return 'What number is missing in the progression?';
}

function game(): array
{
    $startNumber = generateNumber();
    $size = PROGRESSION_MIN_SIZE + generateNumber(PROGRESSION_RECOMEND_SIZE - PROGRESSION_MIN_SIZE);
    $commonDiff = generateNumber(PROGRESSION_MAX_COMMON_DIFF);
    $progression = generateProgression($size, $startNumber, $commonDiff);
    $hiddenIndex = generateNumber(count($progression)) - 1 ;

    $correct = (string) $progression[$hiddenIndex];
    $question = makeQuestion($progression, $hiddenIndex);

    return [$question, $correct];
}

function makeQuestion(array $collection, int $index): string
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
