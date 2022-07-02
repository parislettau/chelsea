#!/usr/bin/env sh

PROJECT=~/sites/ninetyninepercent
DEVICE=ParisiMac

cd $PROJECT
git pull
git add .
git commit -m "$DEVICE"
git push

USER=root
HOST=149.28.168.105
WEBROOT=/var/www/ninetyninepercent

ssh -A $USER@$HOST /bin/bash <<EOF
  cd $WEBROOT
  git pull
  sudo chown -R www-data:www-data .
EOF


