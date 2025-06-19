#!/bin/bash

CHOICE=$(gum choose --header="Bump container or atom version? " "Container" "Atom")
MYDIR="$(dirname "$0")"
VFILE="$MYDIR/VERSION"
commit_tag() {
    echo "$1" > $VFILE
    git add $VFILE
    echo "Commiting version $1. Run ./do-release.sh to push tag."
    git commit -m "Bump version: $1"
    git tag -f $1
}

if [ "$CHOICE" == "Container" ];
then
    VER=$(semver -i prerelease $(cat $VFILE))
    commit_tag $VER
elif [ "$CHOICE" == "Atom" ]
then
    AVER=$(gum input --header="Enter new Atom version.")
    REL=1
    VER="$AVER-$REL"
    commit_tag $VER
else
    echo "Input failed."
    exit
fi
