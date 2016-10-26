#!/bin/bash -

echo "Deleting uploads"

# Remove temp files
rm -rf public/images/temp
mkdir public/images/temp

# remove uploads
rm -rf public/images/uploads
mkdir -p public/images/uploads/thumbs
touch public/images/uploads/thumbs/.gitkeep
touch public/images/uploads/.gitkeep
# Remove originals
rm -rf public/images/originals
mkdir public/images/originals


# Reset DB
echo "Reseting DB"
php artisan migrate:reset && php artisan migrate --seed

echo -e "\nDone !"