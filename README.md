# Symfoy ORM
Un projet symfony utilisant l'ORM Doctrine pour gérer la couche data (SQL+repositories)

## How To Use
1. Cloner le projet
2. Faire un `composer install`
3. Créer un fichier `.env.local` et dedans mettre la variable de connexion. Par exemple : `DATABASE_URL="mysql://username:password@127.0.0.1:3306/database_name?serverVersion=8.0.32&charset=utf8mb4"`
4. Exécuter un `php bin/console do:da:cr` pour créer la base de données
5. Exécuter un `php bin/console do:mi:mi` pour exécuter les fichiers de migrations et créer les tables