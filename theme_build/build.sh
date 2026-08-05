#!/bin/bash
# rferris 2026
MYDIR="$(dirname "$0")"
FULL_VER="$(cat $MYDIR/../VERSION)"
VERSION=$(echo $FULL_VER | awk -F"-" '{print $1}')
REL_STR="atom-theme-builder:$VERSION"

docker build -t uqlibrary/$REL_STR .
