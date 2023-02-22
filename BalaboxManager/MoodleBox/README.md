# Installation de MoodleBox

## 1. Nous allons installer MoodleBox sur une carte SD. A quoi sert MoodleBox ?

Au lieu d'utiliser un docker qui sera intéressant dans le cas des informations qui vont transiter entre les différents groupes du projet.
MoodleBox est une solution qui permet de créer un serveur Moodle sur une carte SD. Cela permet de créer un serveur Moodle sans avoir besoin d'un ordinateur. Cela permet aussi de créer un serveur Moodle sur une Raspberry Pi. De plus elle pourra être utilisée de manière autonome, sans connexion internet.

## 2. Téléchargement de MoodleBox

Il faut d'abord télécharger l'image de MoodleBox et la carte SD. Pour cela, faites la commande suivante :
```bash
chmod u=rwx downloadMoodleBox.sh
./downloadMoodleBox.sh
```

Sur l'application, sélectionner l'image Moodlebox et la carte SD.


## 3. Installation de MoodleBox

1. Insérez la carte SD dans la Raspberry Pi et allumez la.
2. Patientez quelques minutes le temps que la Raspberry Pi créer un Wifi nommé MoodleBox
3. Connectez vous au Wifi MoodleBox
4. Faîtes la commande suivante :

```bash
chmod u=rwx installMoodleBox.sh
./installMoodleBox.sh
```

## 4. Téléchargement et installation de la partie identification

```bash
chmod u=rwx installIdentification.sh
./installIdentification.sh
```



