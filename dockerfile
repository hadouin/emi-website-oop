FROM php:8.1-apache
RUN docker-php-ext-install pdo_mysql mysqli