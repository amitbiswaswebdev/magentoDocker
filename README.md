# magentoDocker
Dockerisation of magento open source

composer config --global http-basic.repo.magento.com 3eb970422e696a506855acc88877b4d4 5e92e72212f198d502b7d96854fcf23g

composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition=2.4.6-p1 .

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
--opensearch-timeout=15
--session-save=redis \
--session-save-redis-host=redis-session \
--session-save-redis-log-level=4 \
--session-save-redis-db=2 \
--session-save-redis-port=7379 \
--cache-backend=redis \
--cache-backend-redis-server=redis-cache \
--cache-backend-redis-db=0 \
--cache-backend-redis-port=8379 \
--amqp-host="rabbitmq" \
--amqp-user="magento" \
--amqp-password="magento" \
--amqp-virtualhost="/"

bin/magento mo:dis Magento_AdminAdobeImsTwoFactorAuth Magento_TwoFactorAuth

bin/magento s:up