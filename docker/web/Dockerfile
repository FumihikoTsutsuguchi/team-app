FROM php:8.0.16-apache

ENV TZ Asia/Tokyo
ENV APACHE_DOCUMENT_ROOT /team-app/app

RUN mkdir /team-app
WORKDIR /team-app

COPY ./php.ini /usr/local/etc/php/conf.d/php.ini

RUN ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime \
  && echo ${TZ} > /etc/timezone

RUN apt-get update \
  && apt-get install -y \
    cron \
    vim \
  && docker-php-ext-install pdo_mysql

RUN sed -ri -e \
  's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
  /etc/apache2/sites-available/*.conf

RUN sed -ri -e \
  's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
  /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Node.jsとnpmをインストール
RUN apt-get update \
    && apt-get install -y \
        nodejs \
        npm

# Dart Sassをグローバルにインストール
RUN npm install -g sass
