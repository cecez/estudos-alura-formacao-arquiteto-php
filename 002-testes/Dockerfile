FROM php:8.0-cli
RUN apt-get update && docker-php-ext-install bcmath
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./solucao_juros.php" ]