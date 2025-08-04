FROM php:8.4-fpm-alpine

# Mise à jour des paquets et installation des dépendances de base
RUN apk update && apk add --no-cache \
    build-base \
    zlib-dev \
    mysql-client \
    curl \
    gnupg \
    procps \
    vim \
    nano \
    git \
    unzip \
    libzip-dev \
    postgresql-dev \
    icu-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libexif-dev \
    autoconf \
    make \
    gcc \
    g++

# Installation des extensions PHP
RUN docker-php-ext-install zip pdo_mysql pdo_pgsql pgsql intl gd exif

# Installation de l'extension intl
RUN docker-php-ext-configure intl && \
    docker-php-ext-install intl

# Installation de l'extension gd
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Installation de pecl et des extensions redis et pcov
RUN apk add --no-cache $PHPIZE_DEPS
RUN pecl install redis && docker-php-ext-enable redis
RUN pecl install pcov && docker-php-ext-enable pcov

# Installation de Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN composer config --global process-timeout 3600
# RUN composer global require "laravel/installer"

ARG APP_NAME
ARG APP_ENV
ARG APP_DEBUG
ARG APP_URL

COPY . .

# Create the .env file with the environment variables
RUN echo "APP_NAME=\"${APP_NAME}\"" >> .env && \
    echo "APP_ENV=\"${APP_ENV}\"" >> .env && \
    echo "APP_DEBUG=\"${APP_DEBUG}\"" >> .env && \
    echo "APP_URL=\"${APP_URL}\"" >> .env && \
    echo "DB_CONNECTION=\"sqlite\"" >> .env && \
    echo "DB_DATABASE=\"/var/www/html/database/database.sqlite\"" >> .env && \
    echo "QUEUE_CONNECTION=\"sync\"" >> .env && \
    echo "MAIL_MAILER=\"log\"" >> .env

# Augmenter la limite de mémoire de Composer
ENV COMPOSER_MEMORY_LIMIT=-1

# Déboguer l'installation de Composer
RUN composer install --optimize-autoloader --no-interaction --prefer-dist --verbose

# Copie des fichiers de l'application
COPY . /var/www/html
