#!/usr/bin/env sh

HOST=ubuntu@45.32.247.37
WEBROOT=/etc/easypanel/projects/chelsea-hopper/99-percent/volumes/

# Run rsync with refined options
rsync -r -p -t -z --checksum -P -h -i --delete $HOST:$WEBROOT/content ./
