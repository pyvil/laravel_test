FROM php:7.1-fpm
WORKDIR /var/www/

RUN groupadd laravel
RUN groupmod --gid 1000 laravel
RUN usermod -aG 1000 www-data

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install zip unzip -y

RUN apt-get update && apt-get install -y \
		      libpng-dev \
		      libjpeg-dev \
		      libfreetype6-dev \
              libjpeg62-turbo-dev \
              libmcrypt-dev \
              libpng12-dev \
              libpng12-dev \
              libssl-dev \
              libbz2-dev \
              libgmp-dev \
              libmcrypt-dev \
              libxml2-dev \
              libicu-dev \
		      libxslt-dev 

RUN  docker-php-ext-install -j$(nproc) iconv mcrypt \
	 && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	 && docker-php-ext-install -j$(nproc) gd \
	 && docker-php-ext-install zip \
	 && docker-php-ext-install xsl \
	 && docker-php-ext-install gd \
	 && docker-php-ext-install mbstring \
	 && docker-php-ext-install soap \
	 && docker-php-ext-install intl \
	 && docker-php-ext-install pdo pdo_mysql \
	 && docker-php-ext-install pdo_mysql 				
 
RUN apt-get update && apt-get install -y \
        libssl-dev

ENV TERM xterm

RUN apt-get install nano -y && apt-get install sudo -y

RUN yes | pecl install xdebug
ADD xdebug.ini /usr/local/etc/php/conf.d/