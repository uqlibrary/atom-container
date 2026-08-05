#!/bin/bash
if [ -z $ATOM_VERSION ]; then
    echo "Atom version required."
    exit 1
fi

rm -rf /dist/*
rm -rf /plugins/*

ORIG_THEME="/build/plugins/arDominionB5Plugin"
PROD_THEME="/build/plugins/uqDominionProdB5Plugin"
STAG_THEME="/build/plugins/uqDominionStagingB5Plugin"

mkdir -p $PROD_THEME
mkdir -p $STAG_THEME

rsync -a $ORIG_THEME/ $PROD_THEME/
rsync -a $ORIG_THEME/ $STAG_THEME/

cp /build/apps/qubit/templates/_header.php $PROD_THEME/templates/
cp /build/apps/qubit/templates/_header.php $STAG_THEME/templates/

# Add bg colour for prod
cat <<EOF >> $PROD_THEME/scss/_layout.scss
.bg-uq {
  background-color: #51247a;
}

EOF

# Replace navbar bg for prod
sed -i "s/navbar-dark/navbar-dark bg-uq/g" $PROD_THEME/templates/_header.php

# Replace navbar bg for staging
sed -i "s/navbar-dark/navbar-dark bg-warning/g" $STAG_THEME/templates/_header.php 

export PATH="/usr/local/bin:$PATH"
cd /build
npm install
npm run build


rsync -a $PROD_THEME /plugins/
rsync -a $STAG_THEME /plugins/