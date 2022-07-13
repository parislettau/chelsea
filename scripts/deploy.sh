#!/usr/bin/env sh

PROJECT=${PWD##*/}  # get project directory name
DIRECTORY=~/sites/$PROJECT
DEVICE=ParisiMac

cd $DIRECTORY
git pull
git add .
git commit -m "$DEVICE"
git push

USER=root
HOST=149.28.168.105
WEBROOT=/var/www/$PROJECT

ssh -A $USER@$HOST /bin/bash <<EOF
  cd $WEBROOT
  git pull
  sudo chown -R www-data:www-data .
EOF


