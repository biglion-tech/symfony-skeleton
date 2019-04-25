FROM php:7.2-fpm-alpine3.7 as runtime-php

RUN apk add --no-cache --update \
    autoconf \
    coreutils \
    cyrus-sasl-dev \
    g++ \
    make \
    icu-dev=59.1-r1 \
    zlib-dev \
    && pecl install xdebug-2.6.0 \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-configure bcmath --enable-bcmath \
    && docker-php-ext-configure intl --enable-intl \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql \
    && docker-php-ext-configure mbstring --enable-mbstring \
    && docker-php-ext-configure zip \
    && docker-php-ext-install \
        bcmath \
        intl \
        pdo_mysql \
        mbstring \
        zip

COPY ./build/docker/php/php.ini ${PHP_INI_DIR}
COPY ./build/docker/php/conf.d/ /usr/local/etc/php/conf.d/

WORKDIR /app

ENV COMPOSER_ALLOW_SUPERUSER 1
COPY ./ /app
RUN composer install