#!/usr/bin/env sh

HOST=root@149.28.168.105
WEBROOT=/var/www/ninetyninepercent

rsync -r -a -p -t -u -z --no-perms --no-owner --no-group --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./
