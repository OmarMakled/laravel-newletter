.PHONY: install
install:
	@docker-compose exec app composer install
	@docker-compose exec app php artisan key:generate --ansi
	@docker-compose exec app php artisan config:cache
	@docker-compose exec app php artisan route:cache