FROM php:8.1-fpm
RUN docker-php-ext-install pdo pdo_mysql
COPY . /var/www/html
WORKDIR /var/www/html
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
