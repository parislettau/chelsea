#!/usr/bin/env sh

/bin/bash <<EOF
  git add .
  git commit -m "Paris's MacBook M1"
  git push
EOF

USER=root
HOST=45.63.28.222
WEBROOT=/var/www/html/ninetyninepercent

ssh -A $USER@$HOST /bin/bash <<EOF
  cd $WEBROOT
  git fetch
  git reset --hard origin/main
  sudo chown -R www-data:www-data .

EOF