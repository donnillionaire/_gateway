FROM php:7.4-apache
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        graphviz \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install sockets \
    && docker-php-source delete \
    && curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer
RUN a2enmod rewrite
RUN service apache2 restart
RUN mkdir /app \
&& mkdir /app/api_gateway\
&& mkdir /app/api_gateway/www
COPY . /app/api_gateway/www/
RUN cp -r /app/api_gateway/www/* /var/www/html/.
RUN composer install