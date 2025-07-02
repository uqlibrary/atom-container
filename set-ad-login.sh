#!/bin/bash
echo "Enabling AD login..."
sed -i -e s'/myUser/adUser/g' /atom/src/config/factories.yml