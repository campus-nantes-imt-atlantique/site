
# Site Campus

## Installation du projet 

Avec composer.phar ou composer si installé sur votre pc pour installer les dépendances 

`composer.phar install`

Créer la base de données 

`php bin/console doctrine:database:create`

`php bin/console doctrine:migrations:migrate`

Charger les données dans la base ( les fixtures )

`php bin/console doctrine:fixtures:load` - Entrer yes

(Vous pouvez aussi utiliser le script database.sh du projet pour résumer ces commandes.)

Lancer le serveur

`php bin/console server:run`

Lancer son serveur avec un accès réseau depuis un téléphone par exemple 

`php bin/console server:run 0.0.0.0`

Penser à bien avoir un serveur mysql de lancé avec Wamp ou docker.

Commande docker : `docker run -e MYSQL_ROOT_PASSWORD=root -p 3306:3306 mysql:5.7`

## Bundles utilisés

EasyAdminBundle : Permet de créer une interface d'administration des entitiés doctrine pour permettre aux administrateurs non développeurs du site de mettre à jour les données du site depuis la page http://localhost:8000/admin (Ou en cliquant dans le lien du footer). 
[Documentation EasyAdminBundle](https://symfony.com/doc/master/bundles/EasyAdminBundle/index.html).
Comme indiqué dans la documentation, pour modifier les paramètres du Bundle ou ajouter vos entités il faut se diriger dans config/packages/easy_admin.yaml

FOSUserBundle : Permet de gérer la création d'utilisateur, la connexion, l'inscription etc. ([Documentation FOSUserBundle](https://symfony.com/doc/current/bundles/FOSUserBundle/index.html)).

## Astuces 

### Logiciel 

1) SourceTree pour utiliser git sans les lignes de commandes mais avec une interface graphique. 
1) PhpStorm est un bon IDE pour développer en symfony (Vous pouvez avoir une license étudiante sur le site).  

## Bonnes pratiques

### Traductions 

Toutes les chaines de caractères ne doivent pas être dans le code directement mais dans 
le dossier /translations. Pour chaque chaîne de caractère on associe un mot clé. 

### Git Flow 

https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow 

Voici un tutoriel complet pour comprendre git flow. En effet, pour organiser le code 
on ne peut pas tous travailler sur la même branche (master) mais il faut une branche pour chaque nouvelle 
fonctionnalité. Pour résumer rapidement git flow :
 
- **master** : Est la branche réservée pour les versions en production. La dernière version taguée en master est celle qui
est présente publiquement sur le web. (Vous n'aurez pas à utiliser la master)
- **develop** : Est une branche qui contient une version du site stable sur laquelle nous nous basons pour les développement. 
- **feature** : Les branches appelées feature sont nommées feature/nom-de-la-fonctionnalite et sont tout simplement les nouvelles 
fonctionnalités du site. Par exemple, si vous developpez une fonctionnalité pour ajouter une section dans une page du site, vous allez créer 
une feature correspondant à cette fonctionnalité. Une fois que vous avez fini la fonctionnalité vous allez faire une merge request (ou pull request). 
Pour faire la pull request il suffit simplement d'aller sur github dans la section pull request. 
Ensuite, un autre développeur va consulter votre pull request sur github et va décider si oui ou non votre feature peut être mergé en develop (On appelle ça une review).

Vous n'avez pas le droit de push en master ni en develop. Le seul moyen d'ajouter une fonctionnalité au site est de créer une feature avec git flow, de push sa feature sur 
github, de faire une pull request et qu'un autre développeur face une review sur votre pull request pour accepter ou non de merge la feature en develop. 

