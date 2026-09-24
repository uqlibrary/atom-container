#!/bin/bash

# Fix OAI newline breaking harvest rule
# https://github.com/uqlibrary/atom/commit/3d7e75fde5449ce092a63d4aa416427bdc5a27ae?diff=unified
echo "Applying oai_newline.patch"
patch -d /atom/src -p 1 < /atom/src/patch/oai_newline.patch

# Add reusable components to footer
echo "Applying footer.patch"
patch -d /atom/src/apps/qubit/templates/ -p 1 < /atom/src/patch/footer.patch

# Fix card view to show cultural advice
echo "Applying card_view.patch"
patch /atom/src/apps/qubit/modules/informationobject/templates/_cardViewResults.php < /atom/src/patch/card_view.patch

# Fix qubit actor slug
echo "Applying qubit_actor.patch"
patch /atom/src/lib/model/QubitActor.php < /atom/src/patch/qubit_actor.patch

# Fix menu to include AD config
echo "Fixing LDAP menu item"
/atom/src/patch/fix_ldap_menu.sh

# Fix default configs
echo "Fixing default configs"
/atom/src/patch/default_configs.sh
