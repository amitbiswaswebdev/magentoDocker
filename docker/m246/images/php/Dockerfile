FROM php:8.2-fpm

COPY conf/php.ini /usr/local/etc/php/

RUN apt-get update && apt-get install -y \
	# 	libfreetype-dev \
	# 	libjpeg62-turbo-dev \
	# 	libpng-dev \
	# && docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) mysqli pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.2.18

VOLUME /var/www

WORKDIR /var/www/html

EXPOSE 9000

