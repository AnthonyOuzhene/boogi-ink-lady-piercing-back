# Création BDD

1/ Créer un fichier .env.local à la racine

2/ Récupérer dans .env la ligne de connexion selon bdd
DATABASE_URL="mysql://boogiJulien:boogiJulien@127.0.0.1:3306/boogiink_data?serverVersion=mariadb-10.3.28"
 => Remplir la user et son password + database name  + version of sql


3/ Créer le user avec les commandes suivantes :

```
sh
CREATE USER 'boogiAntho'@'localhost' IDENTIFIED BY 'boogiAntho';
GRANT ALL PRIVILEGES ON boogiink_data.* TO 'boogiAntho'@'localhost';
```

4/ Créer la base de données avec la commande :
bin/console doctrine:database:create