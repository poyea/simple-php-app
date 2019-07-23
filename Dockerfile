FROM php:7.2-apache

COPY . /app
COPY .docker/app.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /app && a2enmod rewrite
