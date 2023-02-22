
# Présentation de l'application interne : Balabox Machine Manager

## 1. Son but

L'application devra permettre à toutes les sous-équipes de pouvoir installer soit :
- Une Machine Virtuelle sous Debian 11 avec Moodle de préinstallé
- Une fichier image(.img) des données du Raspberry PI de la cliente dans le cas où il y a eu des problèmes lors des tests d'une équipe

L'utilisateur devra cependant garantir une excellente connexion internet pour pouvoir télécharger de manière très rapide les 2 fichiers.


## 2. Installation de Python

Tout d'abord, il faut installer Python et lui permette d'exécuter des scripts Python. Pour cela, il faut exécuter la commande suivante :

```bash
chmod u=rwx installPython.sh
./installPython.sh
```


Après l'installation pour utiliser Balabox Manager, il faut lancer la commande suivante dans le dossier où se trouve le fichier main.py :

```bash
python3 main.py
```
Et voilà, l'application est lancée !

## 3. Monter l'image de la Raspberry Pi provenant de la cliente

```bash
chmod u=rwx mountImage.sh
./mountImage.sh
```


## 4. Pour les Développeurs : Modifier le design de l'application

- [Python 3.9](https://www.python.org/downloads/release/python-3913/)
- [Qt designer](https://build-system.fman.io/static/public/files/Qt%20Designer%20Setup.exe)

