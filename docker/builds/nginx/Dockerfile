FROM nginx:stable

ENV PHP_HOST php
ENV PHP_PORT 9000
ENV TERM xterm

RUN groupadd laravel
RUN groupmod --gid 1000 laravel
RUN usermod -aG 1000 www-data

RUN apt-get update && apt-get install nano -y

COPY nginx.conf /etc/nginx/
COPY default.conf /etc/nginx/conf.d/

WORKDIR /var/www/laravel/public