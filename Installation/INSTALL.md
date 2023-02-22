## How to install Moodle in a Docker container



# 1. Installation of Alpine Linux on the Raspberry Pi

Sur votre Machine Linux, lancer le script suivant permettant de télécharger et d'installer Alpine Linux sur la Raspberry Pi 4B+ et 3B+.

```bash	
chmod u=rwx installAlpineLinux.sh
./installAlpineLinux.sh
```

Après cela vous pouvez débrancher la carte SD de votre machine Linux et la mettre dans la Raspberry Pi 4B+ et 3B+.
Vous pouvez maintenant démarrer la Raspberry Pi 4B+ et 3B+ et se connecter en tant que l'utilisateur root, sans mot de passe par défaut.

# 2. Installation of Identification & Docker

Désormais vous pouvez installer Docker et notre projet sur la Raspberry Pi 4B+ et 3B+.
Connectez-vous à la Raspberry Pi en SSH ou en console via un clavier et un écran.

```bash	
wget 


```bash	
chmod u=rwx installIdentification.sh
./installIdentification.sh
```

Login on the system using the provided credentials (ENV vars)

## Configuration
Define the ENV variables in docker-compose.yml file

| Variable Name               | Default              | Description                                                              |
|-----------------------------|----------------------|--------------------------------------------------------------------------|
| LANG                        | en_US.UTF-8          |                                                                          |
| LANGUAGE                    | en_US:en             |                                                                          |
| SITE_URL                    | http://localhost     | Sets the public site url                                                 |
| SSLPROXY                    | false                | Disable SSL proxy to avod site loop. Ej. Cloudfare                       |
| DB_TYPE                     | pgsql                | mysqli - pgsql - mariadb                                                 |
| DB_HOST                     | postgres             | DB_HOST Ej. db container name                                            |
| DB_PORT                     | 5432                 | Postgres=5432 - MySQL=3306                                               |
| DB_NAME                     | moodle               |                                                                          |
| DB_USER                     | moodle               |                                                                          |
| DB_PREFIX                   | mdl_                 | Database prefix. WARNING: don't use numeric values or moodle won't start |
| MY_CERTIFICATES             | none                 | Trusted LDAP certificate or chain getting through base64 encode          |
| MOODLE_EMAIL                | user@example.com     |                                                                          |
| MOODLE_LANGUAGE             | en                   |                                                                          |
| MOODLE_SITENAME             | New-Site             |                                                                          |
| MOODLE_USERNAME             | moodleuser           |                                                                          |
| MOODLE_PASSWORD             | PLEASE_CHANGEME      |                                                                          |
| SMTP_HOST                   | smtp.gmail.com       |                                                                          |
| SMTP_PORT                   | 587                  |                                                                          |
| SMTP_USER                   | your_email@gmail.com |                                                                          |
| SMTP_PASSWORD               | your_password        |                                                                          |
| SMTP_PROTOCOL               | tls                  |                                                                          |
| MOODLE_MAIL_NOREPLY_ADDRESS | noreply@localhost    |                                                                          |
| MOODLE_MAIL_PREFIX          | [moodle]             |                                                                          |
| client_max_body_size        | 50M                  |                                                                          |
| post_max_size               | 50M                  |                                                                          |
| upload_max_filesize         | 50M                  |                                                                          |
| max_input_vars              | 5000                 |                                                                          |
