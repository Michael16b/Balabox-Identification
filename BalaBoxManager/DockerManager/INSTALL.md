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
