FROM php:8.1-apache-buster as dev

RUN apt-get update && apt-get install -y zip libpq-dev nodejs npm
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql
RUN npm i -g yarn

WORKDIR /app/
