# 🚗 Touche pas au klaxon

Application web de gestion de trajets inter-sites développée en PHP selon une architecture MVC.

---

## 📌 Description du projet

Cette application permet aux employés d’une entreprise de consulter, créer et gérer des trajets entre différentes agences afin de faciliter le covoiturage interne.

Le projet inclut une gestion des rôles (utilisateur et administrateur) ainsi qu’un système d’authentification sécurisé.

---

## ⚙️ Fonctionnalités

### 👤 Utilisateur

* Connexion / déconnexion
* Consultation des trajets disponibles
* Création d’un trajet
* Modification de ses propres trajets
* Suppression de ses trajets

### 🛠️ Administrateur

* Gestion des utilisateurs
* Gestion des agences
* Gestion de tous les trajets

---

## 🧱 Architecture

Le projet suit une architecture MVC :

```
app/
 ├── Controllers/
 ├── Core/
 ├── Models/
 └── Views/

config/
database/
public/
 ├── css/
 └── scss/

tests/
```

---

## 🛠️ Technologies utilisées

* PHP 8
* MySQL / MariaDB
* Bootstrap 5
* SASS
* Composer
* PHPStan
* PHPUnit
* Router : izniburak/router

---

## 🗄️ Base de données

Base relationnelle MySQL comprenant :

* users
* trajets
* agences

Relations :

* un utilisateur possède plusieurs trajets
* un trajet est lié à une agence de départ et d’arrivée

---

## 🚀 Installation

### 1. Cloner le projet

```bash
git clone ...
```

### 2. Installer les dépendances

```bash
composer install
```

### 3. Base de données

* créer une base MySQL
* importer le fichier SQL fourni

### 4. Lancer le projet

Avec XAMPP :

```
http://localhost/touche-pas-au-klaxon
```

---

## 🔐 Comptes de test

### Admin

* Email : [admin@klaxon.local](mailto:admin@klaxon.local)
* Mot de passe : Admin123!

### Utilisateur

* Email : [chloe.roux@email.fr](mailto:chloe.roux@email.fr)
* Mot de passe : User123!

---

## 🧪 Tests

Exécution des tests PHPUnit :

```bash
vendor/bin/phpunit tests
```

---

## 👨‍💻 Qualité du code

* Validation des données côté serveur
* Requêtes SQL préparées (PDO)
* Protection contre les injections SQL
* Protection contre XSS (htmlspecialchars)
* Architecture MVC structurée
* Tests unitaires (PHPUnit)
* Analyse statique (PHPStan)

---

## 👤 Auteur

Projet réalisé dans le cadre du Titre Professionnel Développeur Web et Web Mobile (DWWM)
