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

0. clone the repository

- Download [PHP 8.2 - VS16 x64 Non Thread Safe - Zip 30.24MB](https://windows.php.net/download/)
- Unzip
- Rename php.ini-development to php.ini
- Inside php.ini, uncomment `extension_dir = "ext"`
- Inside php.ini, uncomment `extension = openssl`
- Cut the unzipped directory to `C:\` root
- Edit Windows environment variable "Path" and add `C:\php-8.2.11-nts-Win32-vs16-x64`; now you are able to use `php` inside PowerShell
- Now follow the [composer installation guide](https://getcomposer.org/download/)
- Now you are able to `composer install` in this project directory

1. setup [PHPUnit](https://phpunit.de/)

- Follow the [PHPUnit installation guide](https://docs.phpunit.de/en/10.4/installation.html#installing-phpunit); we recommend to install with composer

```powershell
composer require --dev phpunit/phpunit
```

- Now set up the basics settings for PHPUnit

```powershell
vendor/bin/phpunit --generate-configuration
New-Item -Path . -Name "tests" -ItemType "directory" 
```

- Now you are able to run PHPUnit, it will run without running any tests (there is no tests... so it's fine)

```powershell
vendor/bin/phpunit
```

- When executing, PHPUnit create a cache file we need to ignore in repository

```powershell
Add-Content -Path .\.gitignore -Value ".phpunit.cache"
```

2. code & test the FizzBuzz inside the FizzBuzz class (`src/FizzBuzz.php`)

- complete `FizzBuzz` class and elaborate it with multiple methods that make small and very comprehensive task
- create your first test, the `FizzBuzzTest` class and complete the class with methods that test `FizzBuzz` class methods
  - the `FizzBuzzTest`, have to inherit from `PHPUnit\Framework\TestCase` to be able to use assertion methods and do test/validation ([have a look to the doc](https://docs.phpunit.de/en/10.0/assertions.html))
  - in `FizzBuzzTest`, each methods have to start with prefix `test` to be executed
- execute `vendor/bin/phpunit` to run test suite

3. execute fizzbuzz on one integer in `transformFromDatabase()` method you have to implement in `FizzBuzz` class and test it
4. bonus: do a mock of a database interface that should return a list of Numbers, based on `DatabaseInterface`
5. bonus: install & use [infection](https://infection.github.io/guide/)

You are stuck in a step ? Checkout `stepX` branch to get help
