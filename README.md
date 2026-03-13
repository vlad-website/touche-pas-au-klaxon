# Touche pas au klaxon 🚗

Application web de gestion de trajets développée en PHP (MVC).

## Description

Cette application permet aux utilisateurs de publier et consulter des trajets entre différentes agences.

Fonctionnalités principales :

* consultation des trajets disponibles
* création d’un trajet
* modification et suppression de ses trajets
* interface administrateur pour gérer :

  * les utilisateurs
  * les agences
  * les trajets

## Technologies utilisées

* PHP 8
* MySQL
* Bootstrap 5
* SASS
* PHPUnit
* PHPStan
* Router : izniburak/router

## Architecture

Le projet suit une architecture **MVC** :

```
app/
  Controllers/
  Core/
  Models/
  Views/

config/

database/

public/
  css/
  scss/

tests/
```

## Installation

1. Cloner le projet

```
git clone ...
```

2. Installer les dépendances

```
composer install
```

3. Configurer la base de données

Créer une base MySQL et importer le fichier SQL.

4. Lancer le serveur

Avec XAMPP :

```
http://localhost/touche-pas-au-klaxon
```

## Accès administrateur

Compte administrateur de test :

Email :

```
admin@klaxon.local
```

Mot de passe :

```
Admin123!
```

## Accès utilisateur 1

Compte utilisateur de test :

Email :

```
chloe.roux@email.fr
```

Mot de passe :

```
User123!



## Tests

Lancer les tests PHPUnit :

```
vendor/bin/phpunit tests
```

## Auteur

Projet réalisé dans le cadre d’un exercice de développement PHP.
KHARKOVSKYI Vladyslav