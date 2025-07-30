FROM php:7.0-cli

COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

RUN apt-get update && apt-get install -y zip unzip git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --ignore-platform-reqs
