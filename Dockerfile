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

RUN wget -O /tmp/identification-main.tar.gz "https://gitlab.com/balabox/identification/-/archive/main/identification-main.tar.gz?path=Identification" && \
    tar -zxvf /tmp/identification-main.tar.gz -C /var/www/html/moodle --strip-components=2 --wildcards '*/Identification/*' && \
    rm /tmp/identification-main.tar.gz


COPY default /etc/nginx/sites-available/

RUN chown -R www-data:www-data /var/www/html/moodle && \
    chmod -R 755 /var/www/html/moodle

EXPOSE 80

CMD service php7.4-fpm start && service nginx restart && tail -f /dev/null
