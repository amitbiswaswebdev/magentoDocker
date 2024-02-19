# Magento Docker
Dockerization of magento open source

## Prerequisite
- Docker desktop application in your system
- For windows user - WSL2

## Environment used
- MariaDB
- Nginx
- PHP fpm
- OpenSearch
- Open search dashboard
- Redis
- Redis Insight
- RabbitMq
- Varnish

## Compatible magento versions
- 2.4.6-p1
- 2.4.6-p2

## Setup and verify docker
- Create a directory where you want to run this docker
- Clone this Repository to the directory
- Run `docker compose build`
- Run `docker compose up` or `docker compose up -d`
- Check in Browser

## Install Magento
- Check the magento version in docker directory for which this docker is build
- Go inside php-fpm container `docker compose exec php-fpm bash`
- Delete index.php from `/var/www/html`
- Add magento auth keys to the composer `composer config --global http-basic.repo.magento.com YOUR_MAGENTO_KEY YOUR_MAGENTO_SECRET`
- Run `composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition=2.4.6-p1 .`
- Run below CLI command to install magento
    ```
  bin/magento setup:install \
    --base-url=http://localhost \
    --db-host=mariadb \
    --db-name=magento \
    --db-user=magento \
    --db-password=magento \
    --admin-firstname=admin \
    --admin-lastname=admin \
    --admin-email=admin@admin.com \
    --admin-user=admin123 \
    --admin-password=admin123 \
    --language=en_US \
    --currency=USD \
    --timezone=America/Chicago \
    --use-rewrites=1 \
    --search-engine=opensearch \
    --opensearch-host=opensearch-primary \
    --opensearch-port=9200 \
    --opensearch-index-prefix=magento2 \
    --opensearch-timeout=15 \
    --session-save=redis \
    --session-save-redis-host=redis-session \
    --session-save-redis-log-level=4 \
    --session-save-redis-db=2 \
    --session-save-redis-port=6379 \
    --cache-backend=redis \
    --cache-backend-redis-server=redis-cache \
    --cache-backend-redis-db=0 \
    --cache-backend-redis-port=6379 \
    --amqp-host="rabbitmq" \
    --amqp-user="magento" \
    --amqp-password="magento" \
    --amqp-virtualhost="/" 
  ```
- Run `bin/magento mo:dis Magento_AdminAdobeImsTwoFactorAuth Magento_TwoFactorAuth`
- Run `bin/magento s:up`
- Stop or Down the docker
- Copy docker/m246/images/nginx/conf/default.conf.sample to docker/m246/images/nginx/conf/default.conf
- run `docker compose build` again
- From you host machine set correct directory permission to build/ 
- Check in browser