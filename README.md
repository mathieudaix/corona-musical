# corona-musical
Service de streaming de musique.

```shell script
# Clonage du projet
git clone https://github.com/mathieudaix/corona-musical.git

# Installation des dépendances
npm install
composer install

# Lancement du serveur
npm run watch
symfony server start
```

## Configuration de la base de données
Dans le fichier .env, modifier la ligne 32 avec vos informations : DATABASE_URL=mysql://root@localhost:3308/corona-musical?serverVersion=5.7
Ensuite :

```shell script
php bin/console d:s:u --force
```
