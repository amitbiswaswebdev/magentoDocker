# magentoDocker
Dockerisation of magento open source

composer config --global http-basic.repo.magento.com 3eb970422e696a506855acc88877b44d 5e92e72212f198d502b7d96854fcf2c7

composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition=2.4.6-p1 .

bin/magento setup:install \
--base-url=https://localhost \
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
