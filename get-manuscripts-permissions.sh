#!/bin/bash

CLIENT_CONF=/root/.mysql/permget.cnf

# Create credentials file
mkdir -m 700 -p /root/.mysql
echo '[mysql]' > $CLIENT_CONF
echo "user=${ATOM_MYSQL_USERNAME}" >> $CLIENT_CONF
echo "password=${ATOM_MYSQL_PASSWORD}" >> $CLIENT_CONF

cp manuscript_perms.sql manuscript_perms-tmp.sql
sed -i -e "s/db_name/${ATOM_MYSQL_DB}/g" manuscript_perms-tmp.sql
mysql --defaults-extra-file=$CLIENT_CONF --no-tablespaces --single-transaction  -h "$ATOM_MYSQL_HOST" "$ATOM_MYSQL_DB" < manuscript_perms-tmp.sql
