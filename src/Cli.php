<?php

namespace Brain\Games\Cli;

use function cli\prompt;
use function cli\line;

define('MEET_QUESTION', 'May I have your name?');
define('START_PHRASE', 'Welcome to the Brain Games!');

function meetUser(): void
{
    line(START_PHRASE);
    $name =  prompt(MEET_QUESTION);
    line('Hello, %s', $name);
}
