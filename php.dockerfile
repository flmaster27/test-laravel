FROM php:7.3.14-fpm-alpine

ADD ./php/www.conf /usr/local/etc/php-fpm.d/

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

USER laravel
