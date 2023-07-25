FROM nginx:1.22

RUN mkdir -p /var/www/html
RUN touch /var/run/nginx.pid

RUN apt-get update && apt-get install -y openssl && apt-get install -y curl
RUN mkdir /etc/nginx/certs && echo -e "\n\n\n\n\n\n\n" | openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/certs/nginx.key -out /etc/nginx/certs/nginx.crt

COPY ./conf/default.conf /etc/nginx/conf.d/

VOLUME /var/www

WORKDIR /var/www/html