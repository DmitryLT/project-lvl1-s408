<?php
/**
 * Файл для описания функций
 * PHP version 7.2.0
 * @category Executable_File
 * @package  TaggartBrain-games
 * @author  DmitryLT <dim.sha@yandex.ru>
 * @license  no license
 * @link  https://packagist.org/packages/taggart/brain-games
 * */
namespace BrainGames\Run;
use function \cli\line;
use function \cli\prompt;

const ROUNDS = 3;

function init($description, $dataFromGame)
{
    welcome($description);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    for ($i = 1; $i <= ROUNDS; $i++) {
        [$correctAnswer, $question] = $dataFromGame();
        line('Question: %s', $question);
        $answer = prompt('Your answer');

        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s.", $name);
            return;
        }
    }
    line('Congratulations, %s.', $name);
}

function welcome($description)
{
    line('Welcome to the Brain Game!');
    line($description);
    line('');
}
