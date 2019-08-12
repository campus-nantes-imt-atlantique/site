echo "Drop database"
php bin/console doctrine:database:drop --force

echo "Creation de la base"
php bin/console doctrine:database:create

echo "Creation du schema"
php bin/console doctrine:schema:create

echo "Load fixtures"
php bin/console doctrine:fixtures:load
