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
wget https://gitlab.com/balabox/identification/-/archive/main/identification-main.zip


# Décompression du fichier zip
unzip identification-raspberry.zip

# Suppression du fichier zip
rm identification-raspberry.zip

# Aller dans le dossier Installation
cd identification-raspberry/Installation/

# Créer un dossier Moodle à partir du dossier racine rootfs
mkdir -p /rootfs/var/www/moodle

# Copier le contenu de notre projet du dossier Identification dans le dossier Moodle
cp -R ../Identification/* /rootfs/var/www/moodle/

# Démarrer le conteneur
docker-compose up
