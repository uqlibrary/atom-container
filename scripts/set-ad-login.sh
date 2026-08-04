#!/bin/bash
echo "Enabling AD login..."
if [ -f /atom/src/config/factories.yml ]; then
  sed -i -e 's/myUser/adUser/g' /atom/src/config/factories.yml
else
  echo "Error: /atom/src/config/factories.yml not found."
  exit 1
fi