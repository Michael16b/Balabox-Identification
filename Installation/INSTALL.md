## How to install Moodle in a Docker container

# 1. Installation of Alpine Linux on the Raspberry Pi

On your Linux Machine, run the following script to download and install Alpine Linux on the Raspberry Pi 4B+ and 3B+.

```bash	
chmod u=rwx installAlpineLinux.sh
./installAlpineLinux.sh
```
After that you can unplug the SD card from your Linux machine and put it in the Raspberry Pi 4B+ and 3B+.
You can now boot the Raspberry Pi 4B+ and 3B+ and log in as the root user, without a default password.

# 2. Installation of Identification & Docker

Now you can install Docker and our project on the Raspberry Pi 4B+ and 3B+.
Connect to the Raspberry Pi via SSH or console via keyboard and monitor.

```bash	
chmod u=rwx installDocker.sh
./installDocker.sh
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


## 3. Installation of Wifi

We suggest you to use the Wifi connection to connect to the Raspberry Pi 4B+ and 3B+.
To do this you can refer to the following link:[Wifi by Integration Group](https://gitlab.com/balabox/integration/-/tree/main/wifi)

