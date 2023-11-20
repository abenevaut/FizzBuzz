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

### Solution

- Download [PHP 8.2 - VS16 x64 Non Thread Safe - Zip 30.24MB](https://windows.php.net/download/)
- Unzip
- Rename php.ini-development to php.ini
- Inside php.ini, uncomment `extension_dir = "ext"`
- Inside php.ini, uncomment `extension = openssl`
- Cut the unzipped directory to `C:\` root
- Edit Windows environment variable "Path" and add `C:\php-8.2.11-nts-Win32-vs16-x64`; now you are able to use `php` inside PowerShell
- Now follow the [composer installation guide](https://getcomposer.org/download/)
- Now you are able to `composer install` in this project directory

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
        throw new \Exception("DO NOT EDIT THIS");
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

use App\FizzBuzz;
use App\Database;

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
    echo "C'est ok, ce n'est pas encore implemente";
}
```

## 4. bonus: do a mock of a database interface that should return a list of Numbers, based on `DatabaseInterface`
## 5. bonus: install & use [infection](https://infection.github.io/guide/)

You are stuck in a step ? Checkout `stepX` branch to get help
