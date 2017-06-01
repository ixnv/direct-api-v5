FROM php:5.6-alpine

WORKDIR /srv

RUN apk upgrade --update && apk add --no-cache --virtual .build-deps g++ autoconf make git bash openssh-client \
 && pecl install xdebug && docker-php-ext-enable xdebug

RUN echo "date.timezone = Europe/Moscow" >> /usr/local/etc/php/php.ini