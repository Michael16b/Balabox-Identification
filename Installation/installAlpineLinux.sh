#!/bin/bash

# 1. Télécharger l'image Alpine Linux ARM pour Raspberry Pi
wget https://alpinelinux.org/downloads/latest-releases/alpine-rpi-3.14.2-armhf.tar.gz

# 2. Décompresser l'image téléchargée
tar -xvf alpine-rpi-3.14.2-armhf.tar.gz

# 3. Insérer une carte microSD dans l'ordinateur et noter son chemin
echo "Insérez la carte microSD et tapez le chemin du périphérique (ex: /dev/mmcblk0) :"
read sd_card

# 4. Écrire l'image sur la carte microSD
sudo dd if=alpine-rpi-3.14.2-armhf.img of=$sd_card bs=1M

# 5. Terminé !
echo "Installation terminée."