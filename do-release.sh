#!/bin/bash
# rferris 2025
MYDIR="$(dirname "$0")"
VFILE="$MYDIR/VERSION"
git push
git push origin tag $(cat $VFILE)
