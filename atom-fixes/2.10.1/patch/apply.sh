#!/bin/bash
# https://groups.google.com/g/ica-atom-users/c/xlrAWga_1DU
echo "Applying security_yml.patch"
patch -d /atom/src -p 1 < /atom/src/patch/security_yml.patch

# Fix OAI newline breaking harvest rule
# https://github.com/uqlibrary/atom/commit/3d7e75fde5449ce092a63d4aa416427bdc5a27ae?diff=unified
echo "Applying oai_newline.patch"
patch -d /atom/src -p 1 < /atom/src/patch/oai_newline.patch

# Add reusable components to footer
echo "Applying footer.patch"
patch -d /atom/src/apps/qubit/templates/ -p 1 < /atom/src/patch/footer.patch

# Fix menu to include AD config
echo "Fixing LDAP menu item"
/atom/src/patch/fix_ldap_menu.sh

# Fix default configs
echo "Fixing default configs"
/atom/src/patch/default_configs.sh
