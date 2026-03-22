FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git curl unzip libonig-dev libzip-dev zip \
    && docker-php-ext-install mbstring zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --optimize-autoloader

RUN touch database/database.sqlite
RUN chmod -R 777 storage bootstrap/cache database

RUN echo "APP_DEBUG=true" >> .env
RUN echo "APP_ENV=production" >> .env

EXPOSE 8080

CMD php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan storage:link && \
    php -d display_errors=1 artisan serve --host=0.0.0.0 --port=8080