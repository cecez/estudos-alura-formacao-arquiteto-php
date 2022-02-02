FROM composer:latest

FROM php:8.1-cli
RUN apt-get update && pecl install ds && docker-php-ext-enable ds
RUN apt-get install -y libzip-dev zip && docker-php-ext-install zip
WORKDIR /usr/src/myapp
COPY --from=composer /usr/bin/composer /usr/bin/composer
CMD [ "/bin/bash" ]