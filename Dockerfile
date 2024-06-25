FROM php:8.1-fpm

ARG USER_ID
ARG GROUP_ID

# Set www-data user to match host user
RUN usermod -u $USER_ID www-data && groupmod -g $GROUP_ID www-data

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install zip pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
