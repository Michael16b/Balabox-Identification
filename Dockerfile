FROM ${ARCH}erseco/alpine-php-webserver:latest

LABEL maintainer="BESILY Michaël <besily.e2202632@etud.univ-ubs.fr>"

USER root
COPY --chown=nobody rootfs/ /

# crond a besoin de root, donc installons dcron et le paquet cap et définissons les capacités
# sur le binaire dcron https://github.com/inter169/systs/blob/master/alpine/crond/README.md
RUN apk add --no-cache dcron libcap php81-sodium php81-exif php81-pecl-redis php81-ldap php81-fpm && \
    chown nobody:nobody /usr/sbin/crond && \
    setcap cap_setgid=ep /usr/sbin/crond

USER nobody

# Change MOODLE_XX_STABLE for new versions
ENV MOODLE_URL=https://github.com/moodle/moodle/archive/MOODLE_401_STABLE.tar.gz \
    LANG=en_US.UTF-8 \
    LANGUAGE=en_US:en \
    SITE_URL=http://localhost \
    DB_TYPE=pgsql \
    DB_HOST=postgres \
    DB_PORT=5432 \
    DB_NAME=moodle \
    DB_USER=moodle \
    DB_PASS=moodle \
    DB_PREFIX=mdl_ \
    SSLPROXY=false \
    MY_CERTIFICATES=none \
    MOODLE_EMAIL=user@example.com \
    MOODLE_LANGUAGE=en \
    MOODLE_SITENAME=New-Site \
    MOODLE_USERNAME=moodleuser \
    MOODLE_PASSWORD=PLEASE_CHANGEME \
    SMTP_HOST=smtp.gmail.com \
    SMTP_PORT=587 \
    SMTP_USER=your_email@gmail.com \
    SMTP_PASSWORD=your_password \
    SMTP_PROTOCOL=tls \
    MOODLE_MAIL_NOREPLY_ADDRESS=noreply@localhost \
    MOODLE_MAIL_PREFIX=[moodle] \
    client_max_body_size=50M \
    post_max_size=50M \
    upload_max_filesize=50M \
    max_input_vars=5000

RUN curl --location $MOODLE_URL | tar xz --strip-components=1 -C /var/www/html/

# Téléchargement et installation des fichiers d'identification
RUN wget -O /tmp/identification-main.tar.gz "https://gitlab.com/balabox/identification/-/archive/main/identification-main.tar.gz?path=Identification" && \
    tar -zxvf /tmp/identification-main.tar.gz -C /var/www/html --strip-components=3 && \
    rm /tmp/identification-main.tar.gz

# Ajouter les permissions d'exécution au fichier 02-configure-moodle.sh
RUN chmod +x /docker-entrypoint-init.d/02-configure-moodle.sh

EXPOSE 80
