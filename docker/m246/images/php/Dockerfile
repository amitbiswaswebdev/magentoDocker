FROM php:8.2-fpm

# ARG app_user_id
# ARG app_group_id
ARG NODE_VERSION=20

COPY conf/php.ini /usr/local/etc/php/

# RUN mkdir /sock

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.2.21
RUN curl -sL https://deb.nodesource.com/setup_$NODE_VERSION.x  | bash -

RUN apt-get clean
RUN apt-get update

# Install dependencies
RUN apt-get install -y \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libicu-dev \
    libmcrypt-dev \
    libxslt1-dev \
    sendmail-bin \
    sendmail \
    sudo \
    libzip-dev \
    libonig-dev \
    curl \
    libsodium-dev \
    libxml2 \
    openssl \
    libcurl4-openssl-dev \
    libpcre3 \
    libpcre3-dev \
    unzip \
    nodejs

RUN npm install -g yarn

# Configure the gd library
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-configure opcache --enable-opcache
RUN docker-php-ext-configure zip

# Install required PHP extensions
RUN docker-php-ext-install \
    dom \ 
    gd \ 
    intl \ 
    mbstring \ 
    pdo_mysql \ 
    xsl \ 
    zip \ 
    soap \ 
    bcmath \ 
    pcntl \ 
    sockets \
    opcache \
    ctype \
    fileinfo \
    filter \
    iconv \
    simplexml \
    sodium \
    xmlwriter \
    xsl
# RUN docker-php-ext-install zlib 
# RUN docker-php-ext-install tokenizer
# RUN docker-php-ext-install json
# RUN docker-php-ext-install libxml
# RUN docker-php-ext-install openssl
# RUN docker-php-ext-install pcre
# RUN docker-php-ext-install hash

RUN docker-php-ext-enable \
    dom \ 
    gd \ 
    intl \ 
    mbstring \ 
    pdo_mysql \ 
    xsl \ 
    zip \ 
    soap \ 
    bcmath \ 
    pcntl \ 
    sockets \
    opcache \
    ctype \
    fileinfo \
    filter \
    iconv \
    simplexml \
    sodium \
    xmlwriter \
    xsl

# RUN groupadd -g ${app_group_id} app && useradd -g ${app_group_id} -u ${app_user_id} -d /var/www -s /bin/bash app

# RUN chown -R app:app /usr/local/etc/php/conf.d
# RUN chown -R app:app /usr/local/etc/php/conf.d

# USER app:app

VOLUME /var/www

WORKDIR /var/www/html

EXPOSE 9000