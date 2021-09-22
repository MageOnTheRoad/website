#!/bin/bash

set -e

reset && ./rsync-build.sh

reset && rsync -chavzP --stats --delete --dry-run \
--exclude '.env' \
--exclude '.git' \
--exclude '.idea' \
--exclude 'error_log' \
--exclude 'node_modules' \
--exclude 'public/bundles' \
--exclude 'var' \
--exclude 'vendor' \
/home/mgontijo/tmp/mageontheroad-build/ \
mageonth@mageontheroad.com:/home/mageonth/mageontheroad/ | \
grep -E -v '\/$'
