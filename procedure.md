# Creation BDD

1/ Creer un fichier .env.local a la racine

2/ Recuperer dans .env la ligne de connexion selon bdd
DATABASE_URL="mysql://boogiJulien:boogiJulien@127.0.0.1:3306/boogiink_data?serverVersion=mariadb-10.3.28"
 => Remplir la user et son password + database name  + version of sql


3/ Creer le user avec les commandes suivantes :

```
sh
CREATE USER 'boogiJulien'@'localhost' IDENTIFIED BY 'boogiJulien';
GRANT ALL PRIVILEGES ON boogiink_data.* TO 'boogiJulien'@'localhost';
```

4/ Creer la base de donnees avec la commande :
bin/console doctrine:database:create

5/ Commencer a creer les entites avec le maker :
bin/console make:entity "nom-de-entite"