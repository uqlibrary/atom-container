#!/bin/bash
MYDIR="$(dirname "$0")"
VFILE="$MYDIR/VERSION"
docker pull "uqlibrary/atom-container:$(cat $VFILE)"
