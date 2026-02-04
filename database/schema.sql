-- Création de la base de données
CREATE DATABASE IF NOT EXISTS touche_pas_au_klaxon
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- Utilisation de la base
USE touche_pas_au_klaxon;

-- =======================
-- TABLE UTILISATEURS
-- =======================
CREATE TABLE users (
    -- Identifiant unique de l'utilisateur
    id INT AUTO_INCREMENT PRIMARY KEY,

    -- Prénom de l'employé
    prenom VARCHAR(100) NOT NULL,

    -- Nom de l'employé
    nom VARCHAR(100) NOT NULL,

    -- Email utilisé pour la connexion
    email VARCHAR(150) NOT NULL UNIQUE,

    -- Numéro de téléphone
    telephone VARCHAR(20),

    -- Rôle de l'utilisateur (USER ou ADMIN)
    role ENUM('USER', 'ADMIN') NOT NULL DEFAULT 'USER'
);

-- =======================
-- TABLE AGENCES
-- =======================
CREATE TABLE agences (
    -- Identifiant unique de l'agence
    id INT AUTO_INCREMENT PRIMARY KEY,

    -- Nom de la ville
    nom VARCHAR(150) NOT NULL
);

-- =======================
-- TABLE TRAJETS
-- =======================
CREATE TABLE trajets (
    -- Identifiant unique du trajet
    id INT AUTO_INCREMENT PRIMARY KEY,

    -- Date et heure de départ
    date_depart DATETIME NOT NULL,

    -- Date et heure d'arrivée
    date_arrivee DATETIME NOT NULL,

    -- Nombre total de places
    places_total INT NOT NULL,

    -- Nombre de places encore disponibles
    places_disponibles INT NOT NULL,

    -- Auteur du trajet
    user_id INT NOT NULL,

    -- Agence de départ
    agence_depart_id INT NOT NULL,

    -- Agence d'arrivée
    agence_arrivee_id INT NOT NULL,

    -- Clé étrangère vers users
    CONSTRAINT fk_trajet_user FOREIGN KEY (user_id)
        REFERENCES users(id),

    -- Clé étrangère agence départ
    CONSTRAINT fk_trajet_agence_depart FOREIGN KEY (agence_depart_id)
        REFERENCES agences(id),

    -- Clé étrangère agence arrivée
    CONSTRAINT fk_trajet_agence_arrivee FOREIGN KEY (agence_arrivee_id)
        REFERENCES agences(id)
);