# Symfoy ORM
Un projet symfony utilisant l'ORM Doctrine pour gérer la couche data (SQL+repositories)

## How To Use
1. Cloner le projet
2. Faire un `composer install`
3. Créer un fichier `.env.local` et dedans mettre la variable de connexion. Par exemple : `DATABASE_URL="mysql://username:password@127.0.0.1:3306/database_name?serverVersion=8.0.32&charset=utf8mb4"`
4. Exécuter un `php bin/console do:da:cr` pour créer la base de données
5. Exécuter un `php bin/console do:mi:mi` pour exécuter les fichiers de migrations et créer les tables


## Exercice

### Faire l'update et le remove du student
1. Créer une route /api/student/{id} en DELETE. Dans les paramètres de la route, mettre un argument de type Student. Utiliser le remove() de l'entity manager et un flush, pour supprimer le student
2. Créer une route /api/student/{id} en PATCH. Mettre un Student en paramètre de la méthode puis faire la même chose que ce qu'on faisait pour nos autres PATCH, à la différence que pour faire persister les modification on aura juste à exécuter un flush (il 'y a de toute façon pas de méthode update)

Bonus: Utiliser le findBy pour rajouter de la pagination

### L'entité Note
1. Créer une nouvelle entité Note qui aura un createdAt en DateTime, une review en text, un attachmentLink en string et une relation avec l'entité Student pour faire qu'un Student ait plusieurs Notes et une Note soit liée à un Student
2. Faire les migrations
3. Créer un NoteController avec juste un findAll et un persist