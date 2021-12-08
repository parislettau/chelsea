#!/usr/bin/env sh

HOST=root@45.63.28.222
WEBROOT=/var/www/html/ninetyninepercent

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete ./ $HOST:$WEBROOT/content 
