# Planning-in-luv

## Utilisation 

Un dump de la base de données est disponnible dans le dossier DumpDB.

À l'ouverture la page home s'affiche, elle ne contient que des liens vers les autres pages inaccessibles en tant qu'utilisateur non connecté.

En cliquant sur n'importe lequel de ces liens, une redirection vers la page de connexion s'ouvre.

Pour ce connecter, il y a un compte ayant le role "ROLE_ADMIN".
Les identifiants sont:
    
    - y.beneito@gmail.fr
    - 123456waz

Pour avoir la vue d'un utilisateur ayant le role "ROLE_USER":
    
    -   y.beneito@gmail.com
    -   123456waz

L'admin a acces à la section /admin qui permet grâce à EasyAdmin de gérer les entitées via des formulaires.
Les users ont access au reste du site (liste et details des entitées).

## Cas d'utilisations implémentés

Tous les utilisateurs connectés peuvent voir les pages mais les fonctionnalités pour s'ajouter aux groupes, projects, ajouter un collaborateur sont pour l'instant manquante. 
