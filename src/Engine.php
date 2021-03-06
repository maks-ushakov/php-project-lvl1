<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

define('ENGINE_MIN_VALUE', 1);
define('ENGINE_MAX_VALUE', 100);
define('MAX_ROUNDS', 3);
define('ENGINE_MEET_QUESTION', 'May I have your name?');
define('ENGINE_START_PHRASE', 'Welcome to the Brain Games!');
define('ENGINE_WRONG_MESSAGE', "'%s' is wrong answer ;(. Correct answer was '%s'");

function run(callable $game, string $rule): void
{
    $name = getName();
    line($rule);
    $result = true;
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        [$question, $correctAnswer] = $game();
        line('Question: %s', $question);
        $answer = prompt('Your answer');
        if ($answer !== (string) $correctAnswer) {
            showWrongMessage($answer, $correctAnswer);
            $result = false;
            break;
        }
        line('Correct');
    }
    showEndMessage($name, $result);
}

function generateNumber(int $maxNumber = ENGINE_MAX_VALUE): int
{
    return random_int(ENGINE_MIN_VALUE, $maxNumber);
}

function getName(): string
{
    line(ENGINE_START_PHRASE);
    $name =  prompt(ENGINE_MEET_QUESTION);
    line('Hello, %s', $name);
    return $name;
}

function showWrongMessage(string $answer, string $correct): void
{
    line(ENGINE_WRONG_MESSAGE, $answer, $correct);
}

function showEndMessage(string $name, bool $result): void
{
    if ($result) {
        line('Congratulations, %s!', $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}

function even(): void
{
    $game = 'Brain\Games\Games\Even\game';
    $rule = \Brain\Games\Games\Even\rule();
    run($game, $rule);
}

function calc(): void
{
    $game = 'Brain\Games\Games\Calc\game';
    $rule = \Brain\Games\Games\Calc\rule();
    run($game, $rule);
}

function gcd(): void
{
    $game = 'Brain\Games\Games\Gcd\game';
    $rule = \Brain\Games\Games\Gcd\rule();
    run($game, $rule);
}

function progression(): void
{
    $game = 'Brain\Games\Games\Progression\game';
    $rule = \Brain\Games\Games\Progression\rule();
    run($game, $rule);
}

function prime(): void
{
    $game = 'Brain\Games\Games\Prime\game';
    $rule = \Brain\Games\Games\Prime\rule();
    run($game, $rule);
}
