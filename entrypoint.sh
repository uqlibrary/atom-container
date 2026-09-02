#!/usr/bin/env bash

set -o errexit
set -o pipefail
set -o nounset
# set -o xtrace

__dir="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

case $1 in
    '')
        echo "Usage: (convenience shortcuts)"
        echo "  ./entrypoint.sh worker      Execute worker."
        echo "  ./entrypoint.sh fpm         Execute php-fpm."
        echo ""
        echo "You can also pass other commands:"
        echo "  ./entrypoint.sh bash"
        echo "  ./entrypoint.sh uptime"
        echo "  ./entrypoint.sh ls -l /"
        exit 0
        ;;
    'worker')
        # Give some extra time to MySQL and Gearman to start
        # and add some interval in between restarts.
        echo "Waiting a bit for the DB to warm up..."
        sleep 10
        exec php ${__dir}/symfony jobs:worker
        ;;
    'fpm')
        # Make src available in copy volume
        echo "Copying atom src to copy volume."
        rsync -a --delete --exclude /downloads/* --exclude /uploads/* --exclude /cache/* --exclude /log/* --exclude /config/* --exclude /apps/qubit/config/* /atom/src/ /atom/src-copy/
        # Clean-ups
        #rm -rf /usr/local/etc/php-fpm.d/*
        rm -rf ${__dir}/cache/*

        # Populate configuration files
        php ${__dir}/bootstrap.php $@
        status=$?
        if [ $status -ne 0 ]; then
            echo "bootstrap.php failed!"
            exit $status
        fi
        exec /usr/bin/php-fpm --allow-to-run-as-root
        ;;
esac

exec "${@}"
