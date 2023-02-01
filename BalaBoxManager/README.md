
# Présentation de l'application interne : BalaboxManager

## 1. Son but

L'application devra permettre à toutes les sous-équipes de pouvoir installer soit :
- Une Machine Virtuelle sous Debian 11 avec Moodle de préinstallé
- Une fichier image(.img) des données du Raspberry PI de la cliente dans le cas où il y a eu des problèmes lors des tests d'une équipe

L'utilisateur devra cependant garantir une excellente connexion internet pour pouvoir télécharger de manière très rapide les 2 fichiers.


## 2. Installation de Python

Tout d'abord, il faut installer Python et lui permette d'exécuter des scripts Python. Pour cela, il faut exécuter la commande suivante :

```bash
./installPython.sh
```


Après l'installation pour utiliser Balabox Manager, il faut lancer la commande suivante dans le dossier où se trouve le fichier main.py :

```bash
python3 main.py
```
Et voilà, l'application est lancée !

## 3. Monter l'image de la Raspberry Pi provenant de la cliente

```bash
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
```


## 4. Pour les Développeurs : Modifier le design de l'application

- [Python 3.9](https://www.python.org/downloads/release/python-3913/)
- [Qt designer](https://build-system.fman.io/static/public/files/Qt%20Designer%20Setup.exe)

