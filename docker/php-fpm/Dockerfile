ARG PHP_VERSION

FROM php:${PHP_VERSION}-fpm-alpine

USER root

# Install nodejs & npm
RUN apk add --no-cache \
    nodejs \
    npm

# Install laravel necessary packages
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions bcmath gd memcached

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Setup docker user to prevent right and access conflicts
RUN addgroup -g 1000 -S docker \
 && adduser -D -u 1000 -S docker -G docker

# Set the default user
USER docker
