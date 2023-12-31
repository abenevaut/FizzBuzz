# KATA: Test your FizzBuzz

- [Exercise Summary](https://codingdojo.org/kata/FizzBuzz/)

## Setup your computer

- [Download PHP](https://windows.php.net/downloads/releases/php-8.2.11-nts-Win32-vs16-x64.zip)
- [Download Composer](https://getcomposer.org/download/)

## Initialize the project

```
git clone
cd kata-phpunit
composer install
php src/main.php
```

# Do the KATA

Following [this exercise summary](https://codingdojo.org/kata/FizzBuzz/):
## 0. clone the repository
## 1. setup [PHPUnit](https://phpunit.de/)
## 2. code & test the FizzBuzz inside the FizzBuzz class (`src/FizzBuzz.php`)
## 3. create your first mock

execute fizzbuzz inside `transformFromDatabase()` on an integers list provided by Database::getNumbers().
but.. you cannot change `Database::getNumbers()`, so mock it!

### Add followings files:

- `src/DatabaseInterface.php`
```
<?php

namespace App;

interface DatabaseInterface
{
    /**
     * return a list of numbers
     *
     * @return array
     */
    public function getNumbers(): array;
}
```

- `src/Database.php`
```
<?php

namespace App;

class Database implements DatabaseInterface
{
    public function getNumbers(): array
    {
        throw new \Exception("DO NOT IMPLEMENT", 501);
    }
}
```

### Edit followings files:

- `src/FizzBuzz.php`
```
class FizzBuzz
{
    public function __construct(protected Database $database) {}

    public function transformFromDatabase(): array
    {
        $numbers = $this->database->getNumbers();

        throw new \Exception('Execute the FizzBuzz on your array of numbers');
    }
```

- `src/main.php`
```
<?php
require './vendor/autoload.php';

use App\Database;
use App\FizzBuzz;

$fizzBuzz = new FizzBuzz();
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
    if (501 === $e->getCode()) {
        echo 'Database::getNumbers() not implemented';
    }
}
```

## 4. bonus: do a mock of a database interface that should return a list of Numbers, based on `DatabaseInterface`
## 5. bonus: install & use [infection](https://infection.github.io/guide/)

You are stuck in a step ? Checkout `stepX` branch to get help
