
# Présentation de l'application interne : BalaboxManager

## 1. Son but

L'application devra permettre à toutes les sous-équipes de pouvoir installer soit :
- Une Machine Virtuelle sous Debian 11 avec Moodle de préinstallé
- Une fichier image(.img) des données du Raspberry PI de la cliente dans le cas où il y a eu des problèmes lors des tests d'une équipe

L'utilisateur devra cependant garantir une excellente connexion internet pour pouvoir télécharger de manière très rapide les 2 fichiers.


## 2. Installation de Python

```bash	
#!/bin/bash

# Download Python 3.9
wget https://www.python.org/ftp/python/3.9.1/Python-3.9.1.tar.xz
tar -xf Python-3.9.1.tar.xz
cd Python-3.9.1
./configure
make
make install

# Add .py to the PATH environment variable
echo "export PATH=$PATH:.py" >> ~/.bashrc
source ~/.bashrc

echo "Python download and installation completed!"
```

Après installation pour utiliser Balabox Manager, il faut lancer la commande suivante dans le dossier où se trouve le fichier main.py :

```bash
python3 main.py
```




## 3. Convertir un fichier .UI en .py
Fonctionne UNIQUEMENT SOUS Python 3.9


## 4. Pour les Développeurs : Modifier le design de l'application

- [Python 3.9](https://www.python.org/downloads/release/python-3913/)
- [Qt designer](https://build-system.fman.io/static/public/files/Qt%20Designer%20Setup.exe)

