.DEFAULT_GOAL := all
.PHONY: all clean composer-install cs-fix test

BIN_DOCKER = docker run --rm -v $(PWD):/app -w /app
BIN_RM = rm -rf

all: clean composer-install cs-fix test

clean:
	${BIN_RM} .php-cs-fixer.cache .phpunit.cache .phpunit.result.cache

composer-install:
	${BIN_DOCKER} composer:latest composer update

cs-fix:
	${BIN_DOCKER} php:8.3 vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php --using-cache=no

test:
	${BIN_DOCKER} php:8.3 vendor/bin/phpunit
