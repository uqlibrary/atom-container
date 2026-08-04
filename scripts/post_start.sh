#!/bin/bash
echo "Ensuring database schema is up to date."
php /atom/src/symfony tools:upgrade-sql -B
#php /atom/src/symfony cc