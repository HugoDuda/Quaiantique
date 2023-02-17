Pour accéder à l'interface administrateur en local, il faut créer le compte admin, donc installer DoctrineFixturesBundle :
- composer require --dev orm-fixtures (Symfony 4 et supérieur)
- php bin/console doctrine:fixtures:load (la base de donnée se purge après cette commande)
Le compte administrateur est créé, ainsi que des utilisateurs exemples, il est aussi possible d'en créer avec le formulaire d'inscription.
