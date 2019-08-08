# php-cs-fixer-config

This repository contains the common code style configuration for all Opositatest PHP projects.

It's based on the ideas of [`refinery29/php-cs-fixer-config`](https://github.com/refinery29/php-cs-fixer-config/).

## Installation

```
composer require --dev opositatest/php-cs-fixer-config
```

## Usage

### Configuration

Create a configuration file called `.php_cs.dist` in the project root with the following contents:

```php
<?php

$config = new Opositatest\PhpCsFixerConfig\StrictConfig();
$config->getFinder()
    ->in(__DIR__ . "/src")
    ->in(__DIR__ . "/tests");
return $config;
```

### Manual execution

To execute the fixes manually, you must run the `php-cs-fixer` (usually located at `/vendor/bin` or `/bin`):

```
$ ./vendor/bin/php-cs-fixer fix --config=.php_cs.dist
```

The `--verbose` and `--diff` options can be useful to see what changes are being actually made. To avoid applying changes automatically, the `--dry-run` option can be used:

```
$ ./vendor/bin/php-cs-fixer fix --config=.php_cs.dist --verbose --diff --dry-run
```
## Limiting scope

In large projects, the first time you run the tool you may end up with many changes, making it difficult to spot potential regressions. The tool makes use of the Symonfy Finder component, so you can use any of the filters provided by the component to limit by directory, file names, etc. For example:

### Apply only to given subdirectory

```php
$config->getFinder()
    ->in(__DIR__ . "/src/Model");
```

### Apply only to PHP files which name ends in `Controller`

```php
$config->getFinder()
    ->in("/src")
    ->name("*Controller.php");
```

### Exclude directory

```php
$config->getFinder()
    ->in("/src")
    ->exclude("third-party")
```

## Pre-commit hook

It is possible to configure a `pre-commit` hook to format the code automatically before each commit.

Run `touch .git/hooks/pre-commit` to create a new hook, make it executable with `chmod +x .git/hooks/pre-commit` and paste the following script into `.git/pre-commit`:

```bash
#!/usr/bin/env bash

echo "Running php-cs-fixer..."

CURRENT_DIRECTORY=`pwd`
GIT_HOOKS_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

PROJECT_DIRECTORY="$GIT_HOOKS_DIR/../.."

cd $PROJECT_DIRECTORY;
PHP_CS_FIXER="vendor/bin/php-cs-fixer"

git status --porcelain | grep -e '^[AM]\(.*\).php$' | cut -c 3- | while read line; do
    ${PHP_CS_FIXER} fix --config=.php_cs --verbose ${line};
    git add "$line";
done

cd $CURRENT_DIRECTORY;
echo "Done."
```