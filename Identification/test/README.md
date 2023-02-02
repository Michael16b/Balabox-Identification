# Présentation des tests

## Tests unitaires et tests d'intégration

Les tests unitaires sont des tests qui vérifient le bon fonctionnement des fonctions de l'application. 

Les tests d'intégration sont des tests qui vérifient le bon fonctionnement des fonctions de l'application en se basant sur les données de la base de données.

Ils sont réalisés en se basant sur le framework [PHPUnit](https://phpunit.de/).


## Prérequis

Pour lancer les tests, il faut avoir installé [MoodleBox](https://gitlab.com/balabox/identification/-/tree/raspberry/BalaBoxManager).

## Lancement des tests automatiques

Pour lancer les tests de manière autonome, il faut se placer dans le dossier `test` et lancer la commande suivante :
```bash	
php autoTest.php
```

## Lancement des tests manuellement

Pour lancer les tests manuellement, il faut se placer dans le dossier `test` et lancer la commande suivante :
```bash
php groupDBTest.php
```
```bash	
php userDBTest.php
```

