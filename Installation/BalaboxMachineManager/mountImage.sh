#!/bin/bash

# Vérifiez que l'utilisateur est root
if [ "$EUID" -ne 0 ]
  then echo "S'il vous plaît exécuter en tant que root"
  exit
fi

# Demander le nom de l'image et sa localisation
read -p "Entrez le nom de l'image (ex: /home/user/Downloads/image.img): " img_file

# Demandez à l'utilisateur de saisir le nom de la carte SD
read -p "Entrez le nom de la carte SD (ex: /dev/sdb): " sd_card

# Monter l'image sur la carte SD
dd bs=4M if=$img_file of=$sd_card conv=fsync

echo "Image montée avec succès sur la carte SD!"