#!/bin/bash
FILE="/atom/src/apps/qubit/modules/settings/actions/menuComponent.class.php"
sed -i -e 's/LDAP/AD/g' $FILE && sed -i -e 's/ldap/ad/g' $FILE
