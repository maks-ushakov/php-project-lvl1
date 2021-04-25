<?php

namespace Brain\Games\Even;

use function Cli\prompt;
use function Cli\line;

define('GAME_MEET_QUESTION', 'May I have your name?');
define('GAME_START_PHRASE', 'Welcome to the Brain Games!');
define('RULE', 'Answer "yes" if the number is even, otherwise answer "no".');
define('MAX_TRY', 3);
define('GAME_MIN_VALUE', 1);
define('GAME_MAX_VALUE', 100);

function game()
{
    $name = getName();
    line(RULE);

    $success = true;
    for ($i = 0; $i < MAX_TRY; $i++) {
        $number = generate();
        line('Question, %s', $number);

        $correct = getCorrect($number);
        $answer = prompt('Your answer');
        if ($answer !== $correct) {
            showWrongMessage($answer, $correct);
            $success = false;
            break;
        }
        line('Correct');
    }
    showEndMessage($name, $success);
}

function generate()
{
    return random_int(GAME_MIN_VALUE, GAME_MAX_VALUE);
}

function getCorrect($number)
{
    return $number % 2 === 0 ? 'yes' : 'no';
}

function getName()
{
    line(START_PHRASE);
    $name =  prompt(MEET_QUESTION);
    line('Hello, %s', $name);
    return $name;
}

function showWrongMessage($answer, $correct)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $correct);
}

function showEndMessage($name, $result)
{
    if ($result) {
        line('Congratulations, %s!', $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}
