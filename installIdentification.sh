#!/bin/bash

# Téléchargement du fichier zip
wget https://gitlab.com/balabox/identification/-/archive/raspberry/identification-raspberry.zip

# Déplacement du fichier zip dans le dossier var/www/moodle
mv identification-raspberry.zip /var/www/moodle/

# Accès au dossier var/www/moodle
cd /var/www/moodle/

# Décompression du fichier zip
unzip identification-raspberry.zip

# Suppression du fichier zip
rm identification-raspberry.zip