FROM php:8.1-fpm

RUN docker-php-ext-install mysqli

RUN apt-get update -y && apt-get install -y sendmail libpng-dev

RUN docker-php-ext-install gd

RUN chown -R www-data:www-data /var/www/html