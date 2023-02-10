FROM php:8.1-apache
# authorize rewrite for htaccess
RUN a2enmod rewrite
RUN docker-php-ext-install pdo_mysql mysqli