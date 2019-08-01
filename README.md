# php-cs-fixer-config

This repository contains the common code style configuration for all Opositatest PHP projects.

It's based on the ideas of [`refinery29/php-cs-fixer-config`](https://github.com/refinery29/php-cs-fixer-config/).

## Installation

```
composer require --dev opositatest/php-cs-fixer-config
```

## Usage

### Configuration

Create a configuration file called `.php_cs.dist` or `.php_cs` in the project root with the following contents:

```php
<?php

$config = new Opositatest\PhpCsFixerConfig\StrictConfig();
$config->getFinder()
    ->in(__DIR__ . "/src")
    ->in(__DIR__ . "/tests");
return $config;
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