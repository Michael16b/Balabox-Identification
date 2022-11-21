# BalaBox : Service d'identification

Ce dépôt contient le code source du service d'identification intégré à
la [BalaBox], ainsi que la documentation yafférente.

## Le service d'identification

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
1. création, modification et suppression de groupes d'élèves
1. outil de gestion des absences à partir de l'annuaire de classe
1. gestion l'ursupation d'identification (i.e. détection de multiples connexions avec le même identifiant)

## Mise en œuvre du service d'identification

Le service d'identification est composé de 3 parties: une API REST,
une interface Web élève d'identification et une interface Web
enseignant d'administration permettant de créer un annuaire de classe,
de gérer les absences, de créer des groupes, etc.

L'API REST, qui expose toutes les fonctionnalités présentées
précédemment, est utilisée par les interfaces Web élève et enseignant,
mais aussi par d'autres services de la [BalaBox] afin de connaître
quels sont les élèves connectés/identifiés.

L'API REST offre un accès sécurisé aux fonctionnalités qu'elle expose
à travers un mécanisme de jetons.

[balabox]: https://balabox.gitlab.io/balabox/
[moodlebox]: https://moodlebox.net


# PHP : Installer les extensions 
Version de PHP : 7.4
Extensions à activer : 
- iconv
- mbstring
- curl
- openssl
- xmlrpc
- soap 
- ctype
- tokenizer
- zip
- gd
- simplexml
- spl
- pcre
- dom
- xml
- intl
- json

L'extension correspondant à la base de données est également requise.


Comment activer une extension ?
Dans le fichier php.ini, enlever le ";" devant extension=* afin d'enlever le commentaire
L'étoile représente le nm de l'extension

Une fois les extensions installées, relancer le serveur Web.

Lancer un serveur Web local php : php -S locahost:8000
Pour y accéder, aller à l'adresse entrée.