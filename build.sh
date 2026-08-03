#!/bin/bash
# rferris 2025
MYDIR="$(dirname "$0")"
REL_STR="atom-container:$(cat $MYDIR/VERSION)"
# Test build
docker build -t $REL_STR .
