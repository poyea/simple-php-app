FROM php:7.2-apache
WORKDIR /app
COPY . ./
COPY .docker/app.conf /etc/apache2/sites-available/000-default.conf

RUN chmod -R 777 ./ && a2enmod rewrite
