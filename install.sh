#!/bin/bash

# Construire l'image Docker
docker build -t balabox-identification:latest .

# Lancer les conteneurs Docker avec Docker Compose
docker-compose up -d

# Attendre que les conteneurs soient prêts
echo "Attente de la fin du démarrage des conteneurs..."
sleep 30

# Exécuter les commandes d'installation de Moodle
docker exec -it api-services_web_1 bash -c "php /var/www/html/admin/cli/install.php \
    --non-interactive \
    --agree-license \
    --fullname='My Moodle Site' \
    --shortname='Moodle' \
    --adminuser='moodlebox' \
    --adminpass='Moodlebox4$' \
    --adminemail='admin@example.com' \
    --dataroot='/var/www/moodledata' \
    --dbtype='mysqli' \
    --dbhost='db' \
    --dbname='moodle' \
    --dbuser='moodleuser' \
    --dbpass='secret' \
    --prefix='mdl_' \
    --skip-database"

# Redémarrer les conteneurs pour appliquer les modifications
docker-compose restart
