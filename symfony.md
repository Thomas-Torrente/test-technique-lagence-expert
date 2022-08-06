# SYMFONY

Symfony est un framework (cadriciel) PHP, c'est une boîte à outil logiciel.


Symfony va nous faciliter le développement d'application en PHP, en facilitant la création de CRUD (Create, Read, Update, Delete) par exemple.

- logiciel open source créer en 2009 par qui s'apelle Fabien Potencier.
- Version 5.4
- Symfony se compose de plusieurs composants qui représentent plusieurs niveaux de notre site.


##  LES COMPOSANTS

- doctrine : permet de gérer la BDD, système d'ORM (object Relation Manager)
- twig : va nous servir à faire des templates en HTML.
- monolog : outil pour gérer les historiques et journaux d'utilisation.
- etc.

## COMPOSER

Composer sert à installer les différents composants , par exemple, si on veut utiliser doctrinen on fera : `composer require doctrine` ou si on veut installer un nouveau symfony : `composer create-project symfony/website-skeleton:"^5.4" nomDossier`

## LES RÉPERTOIRES

- bin : il contient les fichiers exécutables, des outils pour simplifier la vie (la console phpinit, etc.)
- config : il contient les fichiers de configurations de symfony et des ces composants, (exemple: si on veut que nos formulaires générés automatiquement soient fait en bootsrap, il faudra modifier un fichier de configuration : twig.yaml)
- migrations : il contient les différentes versions selon l'évolution de la structure de la BDD.
- public : le dossier qui sera accessible par le serveur HTTP.
- src : contient la majorité du code en développpement de l'application.
- template : contient les gabarits HTML.
- tests : contient tous les tests.
- translations : les traductions.
- Fichiers temporaires
- var : fichiers temporaires de symfony (caches)
- vendor : pas lié à Symfony mais à Composer qui stocke tous les fichiers et dossiers à cette endroit.


## LES FICHIERS

- .env : fichier de configuration de l'environnement (connexion à la BDD par exemple).
- composer.json : le fichier qui va être utile à Composer pour paramètrer les différents paquets.

## TWIG

- Twig est une nouvelle façon de faire du HTML.
- Ce langage va nous permettre non seulement d'afficher du contenu grâce au balise HTML que l'on connaît mais aussi du redéfinir du contenu, grâce à des bloc : `{% block body%} {% endblock %}`
- On étendra toujours notre page depuis la page *base.html.twig* => normalement fait automatiquement
- Twig permet aussi, outre le extends de faire des include. Par exemple, on verra comment faire une en-tête et la mettre dans certains fichiers grâce à cette fonction.
- On pourra également appeler des varaibles et ainsi, récupérer des informations directement depuis la BDD. 
- Lorsque l'on veut afficher des images, il faudra utiliser la fonction asset dans l'attribut src de notre image de la façon suivante : `{{ asset('img/nomImg.extension) }}`

##  INSTALLATION
1. Installation de Composer
2. Installation de notre Symfony grâce à `composer create-project symfony/website-skeleton:"^5.4" nomDossier`
3. Customisation du fichier .env avec nos identifiants et le nom de notre BDD à la ligne 31.
4. `php bin/console doctrine:database:create` qui va envoyer notre nouvelle BDD vers PHPMyAdmin.
5. `php bin/console make:entity NomTable` qui va permettre de créer la table de notre BDD
6. `bin/console make:migration` qui enregistre les changements dans un fichier dans le dossier Migrations
7. `bin/console doctrine:migrations:migrate` qui envoie les changements dans la BDD.
8. Pour lancer un serveur local : `php -S localhost:8001 -t public`
9. Pour créer des controllers qui permettront de lancer des vues et définir ce qu'on y affiche on utilisera la commande : `php bin/console make:controller NomController`
10.  Cette commande créera deux fichiers :
    1.  Le controller dans lequel on pourra définir la route mais aussi le chemin d'accès au fichier en Twig.
    2.  Le template twig qu'on pourra personnaliser selon nos besoins.
11. Pour faire un formulaire, on utilisera la commande `php bin/console make:form nomFormType`. Lorsque l'on fait cette commande, symfony nous demande à partir de quelle entité on veut faire notre formulaire, dans l'exemple on précise Articles, et il génère un fichier dans lequel les champs de notre table sont décrits.
12. La page générée (ici ArticleFormType) peut être customisée poour y ajouter des options : 
    1.  On peut dire le type de champs que l'on attend (TextType, TeaxtareaType, DateType, CheckboxType, FileType, etc.)
    2.  On peut préciser directement dans ce fichier des classes
    3.  On peut dire que l'on veut recevoir des fichiers uniquement avec certaines extensions (Par exemple, on accepte seulement les jpeg, jpg, gif, et png)
    4.  On peut préciser si on veut une image en mode portrait ou encore en mode paysage
    5.  Et on peut définir les messages d'erreur si les données entrées dans le formulaire par l'utilisateur ne correspondent pas à ce que l'on attend.
13. Pour faire une nav, on fera un fichier externe (nav.html.twig) et sur lesquel on fera un include pour qu'il soit présent sur notre fichier base.html.twig
14. Pour faire la table User (nomenclature générale) on utilisera la ligne de commande `php bin/console make:user`. Cette façon de faire nous génère facilement une table adapté à l'enregistrement et l'authentification de nouveaux utilisateurs. Cette entité pourra être modifiée si on veut y ajouter des champs grâce à la ligne de commande `php bin/console make:entity User` => mise à jour de l'entité.
15. Pour l'authentification il existe une commande : `php bin/console make:auth` (auth = authentification). Pour s'authentifier, il nous demande plusieurs étapes
    1.  D'abord sur quoi soit doit se basé notre authificator (généralement on dira 1 => login form authenticator)
    2.  Le nom de la classes
    3.  Le nom du Controller
16. Cette méthode nous crée automatiquement plusieurs fichiers (SecurityController => permet d'obtenir une méthode de connexion sécurisée // dans le dossier Security, un fichier UserAuthenticator.php sur lequel il faudra faire des modifications et qui permet de customisée des routes, etc // dans les templates, dans un dossier security, un fichier login.html.twig dans lequel se trouve le formulaire de connexion). Enfin il a mise à jour un fichier très important : dans config / packages / security.yaml => l'authentification et le chemin pour la déconnexion
17. Pour créer l'inscription, on utilise la ligne de commande `php bin/console make:registration-form`. Un certain nombre de questions sont ensuite posées : notamment sur ou on veut être redirigé, quel nom on veut donner à notre classe, etc. Plusieurs fichiers sont générés : 
    1.  RegistrationController
    2.  RegistrationFormType = il faudra faire bien attention à mettre tous les champs pour l'inscription SANS l'id et le rôle // Pour un site de prod, il faudra penser à ajouter les conditions d'utilisation
    3.  register.html.twig dans templates/registration