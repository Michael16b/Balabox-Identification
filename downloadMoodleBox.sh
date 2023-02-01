#!/bin/bash

# Télécharger Moodlebox
wget https://download.moodlebox.net/moodlebox-latest.img

# Télécharger Raspberry Pi Imager pour Linux
wget https://downloads.raspberrypi.org/imager/imager.deb

# installer Raspberry Pi Imager
sudo apt install ./imager.deb

# Ouvrir Raspberry Pi Imager
sudo imager