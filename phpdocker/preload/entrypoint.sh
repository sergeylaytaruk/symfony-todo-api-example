#!/bin/bash

echo "START MIGRATION";
#php bin/console cache:clear
#php bin/console doctrine:migrations:migrate
echo "END MIGRATION";

sleep infinity
#tail -f /dev/null
