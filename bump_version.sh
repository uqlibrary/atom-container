#!/bin/bash

CHOICE=$(gum choose --header="Bump container or atom version? " "Container" "Atom")

commit_tag() {
    echo "Commiting version $1. Run ./do-release.sh to push tag."
    echo git commit -c "Bump version: $1"
    echo git tag $1
}

if [ "$CHOICE" == "Container" ];
then
    VER=$(semver -i prerelease $(cat VERSION))
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
