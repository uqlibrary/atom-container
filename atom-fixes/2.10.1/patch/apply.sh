#!/bin/bash
# https://groups.google.com/g/ica-atom-users/c/xlrAWga_1DU
echo "Applying security_yml.patch"
patch -d /atom/src -p 1 < /atom/src/patch/security_yml.patch

# Fix OAI newline breaking harvest rule
# https://github.com/uqlibrary/atom/commit/3d7e75fde5449ce092a63d4aa416427bdc5a27ae?diff=unified
echo "Applying oai_newline.patch"
patch -d /atom/src -p 1 < /atom/src/patch/oai_newline.patch
