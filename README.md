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

Afin d'installer MoodleBox et ce travail dans voptre REaspoberry Pi, faites les commandes suivantes dans un terminal de commande d'ordinateur :

```
#!/bin/bash
```
1. Télécharger Moodlebox
wget https://download.moodlebox.net/moodlebox-latest.img

1. Télécharger Raspberry Pi Imager pour Linux
wget https://downloads.raspberrypi.org/imager/imager.deb

1. Installer Raspberry Pi Imager
```
sudo apt install ./imager.deb
```

1. Ouvrir Raspberry Pi Imager
```
sudo imager
```

1. Sélectionner l'image Moodlebox et la carte SD

Faites ensuite ces commandes dans MoodleBox : 

```
#!/bin/bash
```
1.Utiliser un terminal de commande et connectez-vous en ssh à MoodleBox

ssh moodlebox@moodlebox
1. Mettre le mot de passe : Moodlebox4$
```
sudo -i
```

1. Créer un fichier de configuration par défaut pour Nginx
```
sudo touch /etc/nginx/sites-available/default
```

1. Ajouter le contenu à partir de la configuration fournie
```
sudo echo "# Default server configuration
#
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    listen 443 ssl;
    listen [::]:443 ssl;
    ssl_certificate /etc/nginx/ssl/moodlebox.pem;
    ssl_certificate_key /etc/nginx/ssl/moodlebox.key;

    root /var/www/moodle;

    index index2.php index.php index.html index.htm index.nginx-debian.html;

    server_name moodlebox;

    location / {
        try_files $uri $uri/ /index2.php;
    }

    location /dataroot/ {
        internal;
        alias /var/www/moodledata/;
    }

    location ~ [^/].php(/|$) {
        include fastcgi_params;
        fastcgi_split_path_info    ^(.+.php)(/.+)$;
        fastcgi_read_timeout    300;
        fastcgi_pass    unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index    index.php;
        fastcgi_param    PATH_INFO    $fastcgi_path_info;
        fastcgi_param    SCRIPT_FILENAME    $document_root$fastcgi_script_name;
        fastcgi_param    PHP_VALUE "max_execution_time=300\n upload_max_filesize=50M\n post_max_size=50M";
        client_max_body_size    50M;
    }

} " | sudo tee -a /etc/nginx/sites-available/default
```

# Balabox Manager

Nous avons crée une machine virtuelle simulant la raspberry pi
de Balabox. Elle peut s'avérer utile pour tester les
fonctionnalités de nos applications.

Voici le lien pour la télécharger : https://univubs-my.sharepoint.com/:u:/g/personal/besily_e2202632_etud_univ-ubs_fr/EQ8xu6AI6yBOkiFyQV6U7EABAGski8TPAoBNL3eNOZGEKg?e=AXZvUq
