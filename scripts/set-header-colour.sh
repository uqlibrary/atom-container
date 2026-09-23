#!/bin/bash
# rferris 2026

# Setup database details
read -ra dsn <<< "$(echo "${ATOM_MYSQL_DSN}" | sed 's/;/& /g')"
DB_HOST="$(echo ${dsn[0]} | awk -F= '{print $2}' | sed 's/;//g')"
DB_DATABASE="$(echo ${dsn[2]} | awk -F= '{print $2}' | sed 's/;//g')"
CLIENT_CONF=/root/.mysql/mysql.cnf

# Create credentials file
mkdir -m 700 -p /root/.mysql
echo '[mysqldump]' > $CLIENT_CONF
echo "user=${ATOM_MYSQL_USERNAME}" >> $CLIENT_CONF
echo "password=${ATOM_MYSQL_PASSWORD}" >> $CLIENT_CONF


if [ ! -z "$HEADER_COLOUR" ]; then
    echo "Setting header colour to ${HEADER_COLOUR}..."
    mysql --defaults-extra-file=$CLIENT_CONF -h $DB_HOST $DB_DATABASE -e "UPDATE setting_i18n t JOIN setting s on s.id = t.id SET t.value = '${HEADER_COLOUR}' WHERE s.name = 'header_background_colour';"
    exit 0
else
    echo "Header colour not set."
    exit 1
fi
