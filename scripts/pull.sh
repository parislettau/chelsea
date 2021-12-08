#!/usr/bin/env sh

HOST=root@45.63.28.222
WEBROOT=/var/www/html/ninetyninepercent

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./

rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete ./ root:45.63.28.222/var/www/html/ninetyninepercent/content


rsync -r


rsync -r -p -t -u -z --checksum --exclude=".*" -P -h -i --delete ./content/* root:45.63.28.222/var/www/html/ninetyninepercent/content