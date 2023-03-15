#!/bin/bash

# Mettre à jour les packages existants
sudo apt-get update

# Installer les dépendances requises pour Docker
sudo apt-get install -y apt-transport-https ca-certificates curl gnupg lsb-release

#Installation des dépendances pour Docker
sudo apt-get remove docker docker-engine docker.io containerd runc
sudo apt-get install docker-ce docker-ce-cli containerd.io

# Installation de Docker Compose
sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# Ajouter l'utilisateur courant au groupe Docker pour éviter d'avoir à utiliser sudo à chaque fois
sudo usermod -aG docker $USER

# Télécharger l'archive Identification-main.tar.gz et extraire son contenu dans le dossier /var/www/html/Identification
sudo docker run --rm -v "$(pwd)/Identification:/mnt" busybox sh -c 'cd /mnt && wget https://gitlab.com/balabox/identification/-/archive/main/identification-main.tar.gz?path=Identification -O - | tar -xz --strip-components=1'

# Ajouter le fichier default.conf au conteneur Docker
sudo docker cp default.conf moodle:/etc/nginx/conf.d/default.conf

# Arrêter et supprimer les conteneurs existants
sudo docker-compose down

# Démarrer le conteneur Docker pour Moodle
sudo docker-compose up -d
