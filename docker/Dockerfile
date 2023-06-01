FROM php:8.1-cli

COPY --chown=www-data:www-data . /var/www/html/
WORKDIR /var/www/html/

RUN apt-get update && \
    apt-get install -y \
        zip \
        unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install
RUN composer dump-autoload

RUN echo "error_log = /var/www/html/logs/app.log" >> /usr/local/etc/php/conf.d/docker-php-ext-error_log.ini

CMD ["php", "-S", "0.0.0.0:80"]
