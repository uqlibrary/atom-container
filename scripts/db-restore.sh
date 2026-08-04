#!/bin/bash
# rferris 2024

if [ $# -lt 1 ];
then
  echo "No file provided..."
  exit 1
fi

# Setup database details
read -ra dsn <<< "$(echo "${ATOM_MYSQL_DSN}" | sed 's/;/& /g')"
DB_HOST="$(echo ${dsn[0]} | awk -F= '{print $2}' | sed 's/;//g')"
DB_DATABASE="$(echo ${dsn[2]} | awk -F= '{print $2}' | sed 's/;//g')"
CLIENT_CONF=/root/.mysql/restore.cnf

# Create credentials file
mkdir -m 700 -p /root/.mysql
echo '[mysql]' > $CLIENT_CONF
echo "user=${ATOM_MYSQL_USERNAME}" >> $CLIENT_CONF
echo "password=${ATOM_MYSQL_PASSWORD}" >> $CLIENT_CONF

if [ -d /dbdumps ]; then
    echo "Restoring database..."
    mysql --defaults-extra-file=$CLIENT_CONF -h "$DB_HOST" "$DB_DATABASE" < "$1"
    exit 0
else
    echo "Database dump directory not configured. Configure bind mount volume at /dbdumps."
    exit 1
fi