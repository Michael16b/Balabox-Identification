# BalaBox : Service d'identification

Ce dépôt contient le code source du service d'identification intégré à
la [BalaBox], ainsi que la documentation y afférente.

# Le service d'identification

Le service d'identification de la [BalaBox] permet aux élèves de
s'identifier à travers une interface Web avant d'accéder à l'un des
services offert par celle-ci. Cette phase d'identification permet
d'offrir à l'enseignant plusieurs fonctionnalités intéressantes, comme
la création d'un annuaire de classe à partir de la liste des élèves
qui se sont identifiés, la constitution de groupes de travail et la
gestion des absences.

## Fonctionnalités offertes par le service d'identification

Le service d'identification offre les fonctionnalités suivantes:

1. création d'un annuaire de classe par saisie des noms et prénoms des élèves, import d'une liste existante (fichier CSV) et import des comptes Moodle de la MoodleBox
1. modification d'un annuaire de classe
1. suppression d'un annuaire de classe
1. association d'un élève, ou groupe d'élèves, à un terminal mobile à travers une interface "élève" simple
1. création de comptes Moodle à partir de l'annuaire avec génération automatique des mots de passe.

## Mise en œuvre du service d'identification

Le service d'identification est composé de 3 parties: une API REST,
une interface Web élève d'identification et une interface Web
enseignant d'administration permettant de créer un annuaire de classe,
des utilisateurs, gérer leurs droits...

L'API REST, qui expose toutes les fonctionnalités présentées
précédemment, est utilisée par les interfaces Web élève et enseignant,
mais aussi par d'autres services de la [BalaBox] afin de connaître
quels sont les élèves connectés/identifiés.

L'API REST offre un accès sécurisé aux fonctionnalités qu'elle expose
à travers un mécanisme de jetons.

[balabox]: https://balabox.gitlab.io/balabox/
[moodlebox]: https://moodlebox.net

# Intégrer ce travail dans la Raspberry Pi

## Afin d'installer MoodleBox et ce travail dans voptre Raspberry Pi, faites la commande suivante dans un terminal de commande d'ordinateur :
```bash
chmod u=rwx downloadMoodleBox.sh
./downloadMoodleBox.sh
```

Sur l'application, sélectionner l'image Moodlebox et la carte SD.


## Faites ensuite ces commandes dans MoodleBox : 
```
chmod u=rwx installMoodleBox.sh
./installMoodleBox.sh
```
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
```

# Application interne : Balabox Manager

Pour optimiser notre temps et éviter d'avoir besoin en permanence de la raspberry pi, nous avons créé une application interne qui permet de gérer la raspberry pi à travers une Virtual Machine. Et permet d'avoir accès au données de la cliente sans avoir besoin de la raspberry pi.