.DEFAULT_GOAL := up

command ?=

MAKE := make
DOCKER_COMPOSE_BIN := docker compose

.PHONY: exec
exec:
	$(DOCKER_COMPOSE_BIN) exec php $(command)

cli:
	$(DOCKER_COMPOSE_BIN) exec php sh

composer-install:
	$(DOCKER_COMPOSE_BIN) exec php composer install --no-interaction
