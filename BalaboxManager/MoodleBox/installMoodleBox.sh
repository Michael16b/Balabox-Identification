#!/bin/bash

# Utiliser un terminal de commande et connectez-vous en ssh à MoodleBox

ssh moodlebox@moodlebox
# Mettre le mot de passe : Moodlebox4$
sudo -i


# Créer un fichier de configuration par défaut pour Nginx
sudo touch /etc/nginx/sites-available/default

# Ajouter le contenu à partir de la configuration fournie
sudo echo '# Default server configuration
#
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    listen 443 ssl;
    listen [::]:443 ssl;
    ssl_certificate /etc/nginx/ssl/moodlebox.pem;
    ssl_certificate_key /etc/nginx/ssl/moodlebox.key;

    root /var/www/moodle;

    index index2.php index.php index.html index.htm index.nginx-debian.html;

    server_name moodlebox;

    location / {
        try_files $uri $uri/ /index2.php;
    }

    location /dataroot/ {
        internal;
        alias /var/www/moodledata/;
    }

    location ~ [^/].php(/|$) {
        include fastcgi_params;
        fastcgi_split_path_info    ^(.+.php)(/.+)$;
        fastcgi_read_timeout    300;
        fastcgi_pass    unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index    index.php;
        fastcgi_param    PATH_INFO    $fastcgi_path_info;
        fastcgi_param    SCRIPT_FILENAME    $document_root$fastcgi_script_name;
        fastcgi_param    PHP_VALUE "max_execution_time=300\n upload_max_filesize=50M\n post_max_size=50M";
        client_max_body_size    50M;
    }

} ' | sudo tee -a /etc/nginx/sites-available/default