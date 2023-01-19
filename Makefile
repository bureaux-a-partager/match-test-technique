build: ## Build the project
	docker compose build
up: ## Run the project
	docker compose up --build -d
	docker compose exec php-fpm bash -c "cd vue-project && npm i"
down: ## Remove all containers
	docker compose stop
	docker compose rm -f
vue: ## Run the vue app on port 5173
	docker compose exec php-fpm bash -c "cd vue-project && npm run dev"
vue-test: ## Test the vue components
	docker compose exec php-fpm bash -c "cd vue-project && npm run test:unit"
php-test-tiny: ## Run tiny tests
	docker compose exec php-fpm bash -c "php php-project/main.php tiny"
php-test-small: ## Run small tests
	docker compose exec php-fpm bash -c "php php-project/main.php small"
php-test-medium: ## Run medium tests
	docker compose exec php-fpm bash -c "php php-project/main.php medium"
php-test-large: ## Run large tests
	docker compose exec php-fpm bash -c "php php-project/main.php large"