<?php

require './vendor/autoload.php';

use App\FizzBuzz;
use App\Database;

$fizzBuzz = new FizzBuzz(new Database());

try {
    $lines = $fizzBuzz->countTo100();

    foreach ($lines as $line) {
        echo $line . PHP_EOL;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $lines = $fizzBuzz->transformFromDatabase();
} catch (Exception $e) {
    echo "C'est ok, ce n'est pas encore implemente";
}
