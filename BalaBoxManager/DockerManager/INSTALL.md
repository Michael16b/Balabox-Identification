## 1. Installation de Docker

Pour installer Docker, il faut exécuter la commande suivante :

```bash
chmod u=rwx installDocker.sh
./installDocker.sh
```
Après l'installation du Docker, vérifiez que Docker est en cours d'exécution en exécutant la commande suivante :

```bash
sudo systemctl status docker
```

Si Docker est en cours d'exécution, vous devriez voir quelque chose comme ceci :

```bash
● docker.service - Docker Application Container Engine
     Loaded: loaded (/lib/systemd/system/docker.service; enabled; vendor preset: enabled)
     Active: active (running) since Wed 2021-05-12 15:02:00 CEST; 1min 5s ago
TriggeredBy: ● docker.socket
       Docs: https://docs.docker.com
    Main PID: 1000 (dockerd)
        Tasks: 14
         Memory: 29.1M
         CGroup: /system.slice/docker.service
                 └─1000 /usr/bin/dockerd -H fd:// --containerd=/run/containerd/containerd.sock
```



## 2. Création de l'image Docker

Pour créer l'image Docker, nous allons procéder en 2 temps :

- Téléchargement de Moodle
Désormais vous devez installer Moodle sur votre machine. Pour cela, il faut exécuter la commande suivante :

```bash
chmod u=rwx downloadMoodle.sh
./downloadMoodle.sh
```
Il faut que Moodle soit installé sur le même repertoire que le Dockerfile.

- Création de l'image Docker

Pour créer l'image Docker, il faut exécuter la commande suivante :

```bash
docker build -t moodle .
```
Vérifier que l'image Docker est bien créée en exécutant la commande suivante :

```bash
docker images
```
Vous devriez voir quelque chose comme ceci :

```bash
REPOSITORY          TAG                 IMAGE ID            CREATED             SIZE
moodle              latest              1d2b3c4d5e6f        1 minute ago        1.2GB
```

## 3. Lancement de l'image Docker

Pour lancer l'image Docker, il faut exécuter la commande suivante :

```bash
docker run -d -p 80:80 moodle
```

Félicitations ! Vous avez lancé l'image Docker de Moodle.




