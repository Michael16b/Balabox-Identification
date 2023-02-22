#!/bin/bash

# Installation des paquets nécessaires

apk update
apk add docker
addgroup username docker
rc-update add docker default
service docker start
rc-update add cgroups
apk add docker-compose


# Téléchargement du fichier zip
wget https://gitlab.com/balabox/identification/-/archive/raspberry/identification-raspberry.zip


# Créer un dossier Moodle à partir du dossier racine rootfs
mkdir -p /rootfs/var/www/moodle

# Déplacement du fichier zip dans le dossier var/www/moodle
mv identification-raspberry.zip /rootfs/var/www/moodle/

# Accès au dossier var/www/moodle
cd /rootfs/var/www/moodle/

# Décompression du fichier zip
unzip identification-raspberry.zip

# Suppression du fichier zip
rm identification-raspberry.zip

# Démarrer le conteneur
docker-compose up
