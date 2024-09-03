FROM php:8.3-apache

WORKDIR /var/www/html

# Apache config
COPY api.conf /etc/apache2/sites-enabled
RUN rm /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www
RUN service apache2 restart

RUN apt update && \
    apt install -y libpq-dev zip && \
    docker-php-ext-install pdo_pgsql && \
    a2enmod rewrite && \
    pecl install xdebug-3.3.1 && \
    docker-php-ext-enable xdebug && \
    pecl install redis-6.0.2 && \
    docker-php-ext-enable redis && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --filename=composer --install-dir=/bin --version=2.7.2 && \
    php -r "unlink('composer-setup.php');"
