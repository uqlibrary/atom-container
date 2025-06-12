#!/bin/bash
# rferris 2025

ATOM_VER=2.9.1
REL_VER=1
REL_STR="${ATOM_VER}-${REL_VER}

# Test build
podman build -t $REL_STR .

#
git commit

# Ask if want to tag and push
git tag $REL_STR

git push