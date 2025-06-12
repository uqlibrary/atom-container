#!/bin/bash
set -xe

# We need rsync ugh
apt update && apt install -y rsync

# Prepare woring dir
mkdir -p /atom/src
cd /atom/src/
git init .
git remote add origin https://github.com/artefactual/atom.git
git pull origin stable/2.8.x 

# Get plugins in place
PLUGINS=$(ls /plugindev/plugins)
for i in $PLUGINS; do
    rsync -a /plugindev/plugins/$i /atom/src/plugins/$i
done

# Install node modules
cd /atom/src/
npm install
npm run build

# Put plugins back
for i in $PLUGINS; do
    rsync -a /atom/src/plugins/$i/ /plugindev/plugins/$i/
done