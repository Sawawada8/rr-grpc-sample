FROM php:8.2-cli

RUN apt-get update && \
    apt-get install -y vim curl git zip unzip \
        libicu-dev 
RUN docker-php-ext-install intl pdo_mysql

COPY --from=composer:2.5.4 /usr/bin/composer /usr/bin/composer
