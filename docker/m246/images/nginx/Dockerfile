FROM nginx:1.22

ARG app_user_id
ARG app_group_id

RUN groupadd -g ${app_group_id} app && useradd -g ${app_group_id} -u ${app_user_id} -d /var/www -s /bin/bash app
RUN touch /var/run/nginx.pid
RUN mkdir /sock

RUN apt-get update && apt-get install -y openssl && apt-get install -y curl
RUN mkdir /etc/nginx/certs && echo -e "\n\n\n\n\n\n\n" | openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/certs/nginx.key -out /etc/nginx/certs/nginx.crt

RUN chown -R app:app /etc/nginx/certs /sock /var/cache/nginx/ /var/run/nginx.pid /sock

COPY ./conf/default.conf /etc/nginx/conf.d/

EXPOSE 8443

USER app:app

VOLUME /var/www

WORKDIR /var/www/html
