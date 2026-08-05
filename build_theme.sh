#!/bin/bash
MYDIR="$(dirname "$0")"
FULL_VER="$(cat $MYDIR/VERSION)"
VERSION=$(echo $FULL_VER | awk -F"-" '{print $1}')

VERDIR="$MYDIR/atom-fixes/$VERSION"
mkdir -p $VERDIR/dist
mkdir -p $VERDIR/plugins

echo "Building themes..."
docker run -v $VERDIR/dist:/build/dist -v $VERDIR/plugins:/plugins --env ATOM_VERSION=$VERSION --rm "uqlibrary/atom-theme-builder:$VERSION"
