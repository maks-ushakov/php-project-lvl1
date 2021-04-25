<?php

namespace Brain\Games\Cli;

use function Cli\prompt;
use function Cli\line;

define('MEET_QUESTION', 'May I have your name?');
define('START_PHRASE', 'Welcome to the Brain Games!');

function meetUser() {
	line(START_PHRASE);
	$name =  prompt(MEET_QUESTION);
	line('Hello, %s', $name);
}