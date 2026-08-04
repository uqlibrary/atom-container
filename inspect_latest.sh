#!/bin/bash
MYDIR="$(dirname "$0")"
VFILE="$MYDIR/VERSION"
docker run --rm --entrypoint /bin/bash -it uqlibrary/atom-container:$(cat $VFILE)