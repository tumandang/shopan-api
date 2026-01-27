
FROM php:8.4-fpm


RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    curl \
    && docker-php-ext-install pdo_mysql zip


WORKDIR /var/www/Shopan-Api


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


COPY . .


RUN composer install --no-dev --optimize-autoloader


RUN chown -R www-data:www-data /var/www/Shopan-Api/storage /var/www/Shopan-Api/bootstrap/cache


EXPOSE 10000


CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
