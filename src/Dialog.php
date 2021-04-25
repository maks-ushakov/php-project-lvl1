<?php

namespace Brain\Games\Dialog;

use function cli\line;
use function cli\prompt;

define('GAME_MEET_QUESTION', 'May I have your name?');
define('GAME_START_PHRASE', 'Welcome to the Brain Games!');
define('WRONG_MESSAGE', "'%s' is wrong answer ;(. Correct answer was '%s'");

function getName()
{
    line(START_PHRASE);
    $name =  prompt(MEET_QUESTION);
    line('Hello, %s', $name);
    return $name;
}

function showWrongMessage($answer, $correct)
{
    line(WRONG_MESSAGE, $answer, $correct);
}

function showEndMessage($name, $result)
{
    if ($result) {
        line('Congratulations, %s!', $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}
