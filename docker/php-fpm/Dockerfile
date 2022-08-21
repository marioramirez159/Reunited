FROM php:8.1.0-fpm

ARG XDEBUG_ENABLE=false
ARG XDEBUG_REMOTE_PORT=0
ARG XDEBUG_REMOTE_HOST=0

RUN apt-get update && apt-get install -y

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
  && docker-php-ext-install \
    zip \
    intl \
    mysqli \
    pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

RUN apt-get install -y gnupg
RUN apt-get install -y apt-transport-https
#RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update
RUN apt-get install -y nodejs
RUN apt-get install -y yarn

RUN if [ $XDEBUG_ENABLE = "true" ] ; then \
        pecl install xdebug; \
        docker-php-ext-enable xdebug; \
        echo "xdebug.remote_enable=true" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.remote_port=${XDEBUG_REMOTE_PORT}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.remote_host=${XDEBUG_REMOTE_HOST}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    fi ;

WORKDIR /var/www/html
