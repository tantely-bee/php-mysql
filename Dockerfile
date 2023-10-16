FROM php:8.0-apache
WORKDIR /var/www/html
COPY . .
RUN apt-get update && docker-php-ext-install mysqli && docker-php-ext-enable mysqli