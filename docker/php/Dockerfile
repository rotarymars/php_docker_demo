FROM php:8.1-fpm

COPY php.ini /usr/local/etc/php/php.ini

RUN apt-get update && apt-get upgrade -y &&\
    apt-get install -y git curl zip unzip &&\
    docker-php-ext-install pdo_mysql

WORKDIR /var/www