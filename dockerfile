FROM php:8.1-apache
# authorize rewrite for htaccess
RUN a2enmod rewrite

RUN docker-php-ext-install pdo_mysql

RUN apt-get update -y && apt-get install -y libcurl4-gnutls-dev  && apt-get clean -y
RUN docker-php-ext-install curl