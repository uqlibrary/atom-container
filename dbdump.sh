#!/bin/bash
# rferris 2024

# Setup database details
read -ra dsn <<< "$(echo "${ATOM_MYSQL_DSN}" | sed 's/;/& /g')"
DB_HOST="$(echo ${dsn[0]} | awk -F= '{print $2}' | sed 's/;//g')"
DB_DATABASE="$(echo ${dsn[2]} | awk -F= '{print $2}' | sed 's/;//g')"
CLIENT_CONF=/root/.mysql/mysqldump.cnf

# Create credentials file
mkdir -m 700 -p /root/.mysql
echo '[mysqldump]' > $CLIENT_CONF
echo "user=${ATOM_MYSQL_USERNAME}" >> $CLIENT_CONF
echo "password=${ATOM_MYSQL_PASSWORD}" >> $CLIENT_CONF

DUMP_TIME="$(date +%Y-%m-%d_%H:%M:%S)"
if [ -d /dbdumps ]; then
    echo "Dumping database"
    mysqldump --defaults-extra-file=$CLIENT_CONF --no-tablespaces --single-transaction  -h $DB_HOST $DB_DATABASE > /dbdumps/${DB_HOST}-${DB_DATABASE}_${DUMP_TIME}.sql
    exit 0
else
    echo "Database dump directory not configured. Configure bind mount volume at /dbdumps."
    exit 1
fi