
# Présentation de l'application interne : BalaboxManager

## 1. Son but

L'application devra permettre soit :
- Balabox Machine Manager : D'installer une Machine Virtuelle sous Debian 11 avec Moodle de préinstallé ou bien un fichier image(.img) des données du Raspberry PI de la cliente dans le cas où il y a eu des problèmes lors des tests d'une équipe - Adapté pour les développeurs
- Docker Manager : Permettre à l'utilisateur d'installer Docker et l'image de notre application sur sa machine en particulier les Raspberry Pi 4B+ et 3B+ - Adapté pour les utilisateurs

L'utilisateur devra cependant garantir une excellente connexion internet pour pouvoir télécharger de manière très rapide les fichiers dans le cas de Balabox Machine Manager.



## 2. Installation


## 3. Optionnel(pour les développeurs) : Installation de MoodleBox

### Nous allons installer MoodleBox sur une carte SD. A quoi sert MoodleBox ?

Au lieu d'utiliser un docker qui sera intéressant dans le cas des informations qui vont transiter entre les différents groupes du projet.
MoodleBox est une solution qui permet de créer un serveur Moodle sur une carte SD. Cela permet de créer un serveur Moodle sans avoir besoin d'un ordinateur. Cela permet aussi de créer un serveur Moodle sur une Raspberry Pi. De plus elle pourra être utilisée de manière autonome, sans connexion internet.

### Téléchargement de MoodleBox

Il faut d'abord télécharger l'image de MoodleBox et la carte SD. Pour cela, faites la commande suivante :
```bash
chmod u=rwx downloadMoodleBox.sh
./downloadMoodleBox.sh
```

Sur l'application, sélectionner l'image Moodlebox et la carte SD.


### Installation de MoodleBox

1. Insérez la carte SD dans la Raspberry Pi et allumez la.
2. Patientez quelques minutes le temps que la Raspberry Pi créer un Wifi nommé MoodleBox
3. Connectez vous au Wifi MoodleBox
4. Faîtes la commande suivante :

```bash
chmod u=rwx installMoodleBox.sh
./installMoodleBox.sh
```

### Téléchargement et installation de la partie identification

```bash
chmod u=rwx installIdentification.sh
./installIdentification.sh
```



