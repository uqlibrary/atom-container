#!/bin/bash
echo "Ensuring database schema is up to date."
php /atom/src/symfony tools:upgrade-sql -B 2>&1 | tee /atom/src/log/db-upgrade.log
