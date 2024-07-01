# evolu



## Deployment

 ###  Configuration de l'Environnement

PHP 8.2 

Symfony CLI

Symfony 

mySQL


###  Cloner le dépot git 
Un dépot git public est associé au projet evolu. Pour le cloner en local, exécuter la commande :

```bash
git clone https://github.com/juliet53/evolu.git

````

###  Configurer les variables d'environnement
Dans le fichier .env.local , ajouter les variables d'environnement:
DATABASE_URL="mysql://root:@127.0.0.1:3306/evolu?&charset=utf8mb4"

```bash
DATABASE_URL="mysql://root:@127.0.0.1:3306/evolu?&charset=utf8mb4"


````



###  Installer les dépendances du projet
Installer les dépendances:

```bash
composer install

````
###  Installer la base de donnée

Créer la base de donneés:

Le projet possede un fichier evolu.sql permettant de créer et remplir la base de données:

Connectez-vous a mysql:

```bash
mysql -u \votreUsername\ -p\votrePassword\
````


Utilisez le fichier evolu.sql:


```bash
source evolu.sql;

````


Une fois terminé, quittez MySQL :

```bash
exit;

````
