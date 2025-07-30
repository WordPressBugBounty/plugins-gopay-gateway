#!/usr/bin/make -f

help: ## This help
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

run-dev: ## Run local development environment
	docker-compose up --build -d

stop-dev: ## Stop running local development environment
	docker-compose stop

down-dev: ## Drop local development environment
	docker-compose down

cli: ## Run shell inside local app container
	docker-compose exec app bash

composer: ## Install composer without dev dependencies
	docker-compose exec app composer install --no-dev --ignore-platform-reqs

composer-dev: ## Install composer with dev dependencies
	docker-compose exec app composer install --ignore-platform-reqs

format-check: ## Check code with wp-coding-standards
	docker-compose exec app vendor/bin/phpcs --standard=WordPress ./ --ignore=*vendor/*

format-fix: ## Fix code with wp-coding-standards
	docker-compose exec app vendor/bin/phpcbf --standard=WordPress ./ --ignore=*vendor/*

cp-vendor: ## Copy vendor directory from app container to host
	docker cp gopay-woocommerce-integration:/usr/src/myapp/vendor ./

cp-composer: ## Copy composer.json and composer.lock files from app container to host
	docker cp gopay-woocommerce-integration:/usr/src/myapp/composer.json ./
	docker cp gopay-woocommerce-integration:/usr/src/myapp/composer.lock ./

update: ## Run composer update --no-dev inside container + copy vendor and composer to host
	docker-compose exec app composer update
	make composer
	make cp-composer
	make cp-vendor

update-dry: ## Run composer update dry run inside app container
	docker-compose exec app composer update --dry-run
