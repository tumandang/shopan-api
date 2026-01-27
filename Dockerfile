FROM php:8.4-fpm

WORKDIR /var/www/Shopan-Api


RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip curl \
    && docker-php-ext-install pdo_mysql zip


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


COPY . .


RUN composer install --optimize-autoloader --no-dev


RUN chown -R www-data:www-data /var/www/Shopan-Api/storage /var/www/Shopan-Api/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
