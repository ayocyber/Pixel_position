# Stage 1 - Build Frontend (Vite)
FROM node:20 AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2 - Backend (Laravel + PHP + Composer)
FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git curl unzip libonig-dev libzip-dev zip \
    && docker-php-ext-install mbstring zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .
COPY --from=frontend /app/public/build ./public/build

RUN composer install --optimize-autoloader

RUN touch database/database.sqlite

RUN php artisan migrate --force
RUN php artisan db:seed --force
RUN php artisan storage:link

RUN chmod -R 777 storage bootstrap/cache

EXPOSE 8080

CMD ["php", "-d", "display_errors=1", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]