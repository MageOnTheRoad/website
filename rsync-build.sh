#!/bin/bash

set -e

rsync -chavzP --delete --stats \
--exclude '.git' \
--exclude '.idea' \
--exclude 'var' \
/home/mgontijo/Documents/mageontheroad/ \
/home/mgontijo/tmp/mageontheroad-build/

cd /home/mgontijo/tmp/mageontheroad-build/

sed -i 's@^BASE_URL=".*@BASE_URL="https://www.mageontheroad.com/"@g' .env
sed -i 's@^APP_ENV=".*@APP_ENV=prod@g' .env

yarn run encore production
