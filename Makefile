.PHONY: install
install:
	@docker-compose exec app composer install
	@docker-compose exec app php artisan key:generate --ansi
	@docker-compose exec app php artisan config:cache
	@docker-compose exec app php artisan route:cache
	@docker-compose exec app php artisan migrate:refresh --seed
	@docker-compose exec app /etc/init.d/cron start

.PHONY: cron-start
cron-start:
	@docker-compose exec app /bin/bash -c 'echo "*/1 * * * * /usr/local/bin/php /var/www/html/artisan schedule:run" | crontab -'
	@echo "Cron job installed successfully."

.PHONY: cron-stop
cron-stop:
	@docker-compose exec app crontab -r
	@echo "Cron job removed successfully."