# Moodle on Alpine Linux

[![Docker Pulls](https://img.shields.io/docker/pulls/erseco/alpine-moodle.svg)](https://hub.docker.com/r/erseco/alpine-moodle/)
![Docker Image Size](https://img.shields.io/docker/image-size/erseco/alpine-moodle)
![nginx 1.20.2](https://img.shields.io/badge/nginx-1.18-brightgreen.svg)
![php 8.0](https://img.shields.io/badge/php-8.0-brightgreen.svg)
![moodle-4.1.1](https://img.shields.io/badge/moodle-4.1.1-yellow)
![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)



## 1. The Goal

The application should allow the user to install Docker and the image of our application on his machine, in particular the Raspberry Pi 4B+ and 3B+.
The user will have to guarantee an excellent internet connection to be able to download the files in a very fast way.

## 2. Installation of Docker

Pour installer Docker, référer vous au fichier : [INSTALL.md](INSTALL.md).


Moodle setup for Docker, build on [Alpine Linux](http://www.alpinelinux.org/).
The image is only +/- 70MB large.


* Built on the lightweight image https://github.com/erseco/alpine-php-webserver
* Very small Docker image size (+/-70MB)
* Uses PHP 8.0 for better performance, lower cpu usage & memory footprint
* Support for HA installations: php-redis, php-ldap(also with self-signed certs)
* Multi-arch support: 386, amd64, arm/v6, arm/v7, arm64, ppc64le, s390x
* Optimized for 100 concurrent users
* Optimized to only use resources when there's traffic (by using PHP-FPM's ondemand PM)
* Use of runit instead of supervisord to reduce memory footprint
* Configured cron to run as non-privileged user https://github.com/gliderlabs/docker-alpine/issues/381#issuecomment-621946699
* docker-compose sample with PostgreSQL
* Configuration via ENV variables
* Easily upgradable to new moodle versions
* The servers Nginx, PHP-FPM run under a non-privileged user (nobody) to make it more secure
* The logs of all the services are redirected to the output of the Docker container (visible with `docker logs -f <container name>`)
* Follows the KISS principle (Keep It Simple, Stupid) to make it easy to understand and adjust the image to your needs
