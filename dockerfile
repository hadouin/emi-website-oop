FROM php:8.1-apache
RUN a2enmod rewrite
RUN docker-php-ext-install pdo_mysql mysqli