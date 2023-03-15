FROM ubuntu:20.04

RUN apt-get update && \
    apt-get upgrade -y && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y nginx php-fpm php-mysql wget unzip openssl

RUN mkdir -p /etc/nginx/ssl && \
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
        -keyout /etc/nginx/ssl/moodlebox.pem \
        -out /etc/nginx/ssl/moodlebox.pem \
        -subj "/C=FR/ST=IDF/L=Paris/O=MyOrg/OU=IT Department/CN=moodlebox.com"

RUN wget https://download.moodle.org/stable310/moodle-3.10.6.tgz && \
    tar -zxvf moodle-3.10.6.tgz && \
    rm moodle-3.10.6.tgz && \
    mv moodle /var/www/html/

COPY default.conf /etc/nginx/conf.d/default.conf

RUN chown -R www-data:www-data /var/www/html/moodle && \
    chmod -R 755 /var/www/html/moodle

EXPOSE 80

CMD service php7.4-fpm start && nginx -g "daemon off;"
