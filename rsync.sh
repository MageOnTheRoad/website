#!/bin/bash

set -e

./rsync-build.sh

rsync -chavzP --stats \
--rsync-path="/home/mageonth/rsync" \
--exclude '.env' \
--exclude '.git' \
--exclude '.idea' \
--exclude 'error_log' \
--exclude 'node_modules' \
--exclude 'public/bundles' \
--exclude 'var' \
--exclude 'vendor' \
/home/mgontijo/tmp/mageontheroad-build/ \
mageonth@mageontheroad.com:/home/mageonth/mageontheroad/

ssh mageonth@mageontheroad.com bash <<EOF
cd /home/mageonth/mageontheroad/
php composer install -vvv --ignore-platform-reqs
php bin/console cache:clear
php bin/console cache:warmup
php bin/console assets:install --symlink
EOF
