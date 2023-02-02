#!/bin/bash

# Update package list and upgrade the system
sudo apt-get update
sudo apt-get upgrade

# Install required packages for Docker installation
sudo apt-get install -y apt-transport-https ca-certificates curl gnupg2 software-properties-common

# Add the Docker GPG key
curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -

# Add the Docker repository to the system
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/debian $(lsb_release -cs) stable"

# Update the package list again and install Docker
sudo apt-get update
sudo apt-get install -y docker-ce

# Add the current user to the Docker group
sudo usermod -aG docker $USER

# Start the Docker service
sudo systemctl start docker

# Enable the Docker service to start on boot
sudo systemctl enable docker
