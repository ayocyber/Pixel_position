FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git curl unzip libonig-dev libzip-dev zip \
    && docker-php-ext-install mbstring zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --optimize-autoloader

# Overwrite .env completely with production values
RUN cat > .env << 'EOF'
APP_NAME=PixelPositions
APP_ENV=production
APP_KEY=base64:6c9vWoP7gj+CqQ7llWIB/Ow/1jWflzj6Nf4sW/9MeSk=
APP_DEBUG=true
APP_URL=https://pixel-position-t9ce.onrender.com
DB_CONNECTION=sqlite
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=public
EOF

RUN touch database/database.sqlite
RUN chmod -R 777 storage bootstrap/cache database

EXPOSE 8080

CMD php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan storage:link && \
    php artisan serve --host=0.0.0.0 --port=8080