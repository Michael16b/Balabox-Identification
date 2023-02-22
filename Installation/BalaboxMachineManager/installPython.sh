#!/bin/bash

# Download Python 3.9
wget https://www.python.org/ftp/python/3.9.1/Python-3.9.1.tar.xz
tar -xf Python-3.9.1.tar.xz
cd Python-3.9.1
./configure
make
make install

# Add .py to the PATH environment variable
echo "export PATH=$PATH:.py" >> ~/.bashrc
source ~/.bashrc

echo "Python download and installation completed!"