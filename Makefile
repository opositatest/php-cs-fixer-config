DOCKER_RUN = docker run --rm -v $(PWD):/app -w /app composer:latest

.PHONY: composer-install

composer-install:
	$(DOCKER_RUN) composer install
