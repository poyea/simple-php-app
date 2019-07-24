FROM php:7.2-apache

COPY . /app
COPY .docker/app.conf /etc/apache2/sites-available/000-default.conf

RUN chmod -R 777 /app && a2enmod rewrite
