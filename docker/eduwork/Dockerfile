FROM php:7.4-fpm-alpine

RUN apk upgrade --update && apk add --no-cache --virtual .build-deps  \
    alpine-sdk \
    autoconf \
    automake \
    cmake \
    g++ \
    libtool \
    && apk add --no-cache \
    libwebp-dev \
    libjpeg-turbo-dev \
    libjpeg-turbo-utils \
    freetype-dev \
    libmcrypt-dev \
    libpng-dev \
    libxpm-dev \
    icu-dev \
    bzip2-dev \
    libxml2-dev \
    libxslt-dev \
    libzip-dev \
    imagemagick \
    imagemagick-dev \
    graphviz \
    && apk add --no-cache \
    bash \
    && docker-php-ext-install intl mysqli bcmath gd bz2 soap xmlrpc xsl pdo_mysql exif zip opcache sockets

RUN curl -O https://getcomposer.org/download/2.3.10/composer.phar \
    && chmod +x composer.phar \
    && mv composer.phar /usr/local/bin/composer