DOCKER_RUN = docker run --rm -v $(PWD):/app -w /app composer:latest

.PHONY: composer-install

composer-install:
	docker run --rm -v $(PWD):/app -w /app composer:latest composer update

test:
	docker run --rm -v $(PWD):/app -w /app php:8.3 vendor/bin/phpunit

cs-fix:
	docker run --rm -v $(PWD):/app -w /app php:8.3 vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php --using-cache=no
