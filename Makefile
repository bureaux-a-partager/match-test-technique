build: ## Build the project
	docker compose build
up: ## Run the project
	docker compose up --build -d
	docker compose exec node bash -c "npm i"
down: ## Remove all containers
	docker compose stop
	docker compose rm -f
vue: ## Run the vue app on port 5173
	docker compose exec node bash -c "npm run dev"
vue-test: ## Test the vue components
	docker compose exec node bash -c "npm run test:unit"
php-test-tiny: ## Run tiny tests
	docker compose exec php bash -c "php main.php tiny"
php-test-small: ## Run small tests
	docker compose exec php bash -c "php main.php small"
php-test-medium: ## Run medium tests
	docker compose exec php bash -c "php main.php medium"
php-test-large: ## Run large tests
	docker compose exec php bash -c "php main.php large"
php-test-custom: ## Run large tests
	docker compose exec php bash -c "php main.php custom $(input)"
php-test-tricky: ## Run tricky tests
	docker compose exec php bash -c "php main.php tricky"