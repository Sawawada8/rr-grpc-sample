FROM ghcr.io/roadrunner-server/roadrunner:2.12.3 AS roadrunner
FROM php:8.1-cli

RUN apt-get update && \
    apt-get install -y vim curl git zip unzip \
        libicu-dev

COPY --from=composer:2.5.4 /usr/bin/composer /usr/bin/composer

COPY --from=roadrunner /usr/bin/rr /usr/local/bin/rr
