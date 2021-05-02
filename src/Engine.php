<?php

namespace Brain\Games\Engine;

use function Cli\line;
use function Brain\Games\Dialog\getName;
use function Brain\Games\Dialog\showEndMessage;

define('ENGINE_MIN_VALUE', 1);
define('ENGINE_MAX_VALUE', 100);
define('MAX_ROUNDS', 3);

function run($game, $rule)
{
    $name = getName();
    line($rule);
    $result = true;
    for ($i = 0; $i < MAX_ROUNDS; $i++) {
        $result &= $game();
        if (!$result) {
            break;
        }
    }
    showEndMessage($name, $result);
}

function generateNumber()
{
    return random_int(ENGINE_MIN_VALUE, ENGINE_MAX_VALUE);
}

function calc()
{
    $game = 'Brain\Games\Games\Calc\game';
    $rule = \Brain\Games\Games\Calc\rule();
    run($game, $rule);
}

function gcd()
{
    $game = 'Brain\Games\Games\Gcd\game';
    $rule = \Brain\Games\Games\Gcd\rule();
    run($game, $rule);
}

function progression()
{
    $game = 'Brain\Games\Games\Progression\game';
    $rule = \Brain\Games\Games\Progression\rule();
    run($game, $rule);
}

function prime()
{
    $game = 'Brain\Games\Games\Prime\game';
    $rule = \Brain\Games\Games\Prime\rule();
    run($game, $rule);
}
