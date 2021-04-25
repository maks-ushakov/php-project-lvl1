<?php

namespace Brain\Games\Even;

use function Cli\prompt;
use function Cli\line;
use function Brain\Games\Dialog\showWrongMessage;

define('RULE', 'Answer "yes" if the number is even, otherwise answer "no".');
define('MAX_TRY', 3);
define('GAME_MIN_VALUE', 1);
define('GAME_MAX_VALUE', 100);

function game()
{
    line(RULE);

    for ($i = 0; $i < MAX_TRY; $i++) {
        $number = generate();
        line('Question, %s', $number);

        $correct = getCorrect($number);
        $answer = prompt('Your answer');
        if ($answer !== $correct) {
            showWrongMessage($answer, $correct);
            return false;
        }
        line('Correct');
    }
    return true;
}

function generate()
{
    return random_int(GAME_MIN_VALUE, GAME_MAX_VALUE);
}

function getCorrect($number)
{
    return $number % 2 === 0 ? 'yes' : 'no';
}
