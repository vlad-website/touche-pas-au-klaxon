<?php
declare(strict_types=1);

namespace App\Models;

use PDO;

class Trajet {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
    * @return array
    */

    public function getAvailableFutureTrajets(): array {
        // Requête SQL sécurisée
        $sql = "
            SELECT 
                t.id,
                a_dep.nom AS agence_depart,
                t.date_depart,
                a_arr.nom AS agence_arrivee,
                t.date_arrivee,
                t.places_disponibles
            FROM trajets t
            JOIN agences a_dep ON t.agence_depart_id = a_dep.id
            JOIN agences a_arr ON t.agence_arrivee_id = a_arr.id
            WHERE 
                t.date_depart > NOW()
                AND t.places_disponibles > 0
            ORDER BY t.date_depart ASC
        ";

        // Préparation de la requête
        $stmt = $this->pdo->prepare($sql);

        // Exécution
        $stmt->execute();

        // Retourne tous les résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAvailableFutureTrajetsWithAuthor(): array {
        $sql = " 
            SELECT 
                t.id,
                t.user_id,
                a_dep.nom AS agence_depart,
                t.date_depart,
                a_arr.nom AS agence_arrivee,
                t.date_arrivee,
                t.places_disponibles,
                t.places_total,

                u.prenom,
                u.nom,
                u.email,
                u.telephone

            FROM trajets t
            JOIN agences a_dep ON t.agence_depart_id = a_dep.id
            JOIN agences a_arr ON t.agence_arrivee_id = a_arr.id
            JOIN users u ON t.user_id = u.id
            WHERE
                t.date_depart > NOW()
                AND t.places_disponibles > 0
            ORDER BY t.date_depart ASC
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): array|false {
        $sql = "SELECT * FROM trajets WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): void {
        $sql = "DELETE FROM trajets WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function create(array $data): void {
        $sql = "
            INSERT INTO trajets (
                agence_depart_id,
                agence_arrivee_id,
                date_depart,
                date_arrivee,
                places_total,
                places_disponibles,
                user_id
            ) VALUES (
                :agence_depart_id,
                :agence_arrivee_id,
                :date_depart,
                :date_arrivee,
                :places_total,
                :places_disponibles,
                :user_id
            )
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':agence_depart_id' => $data['agence_depart_id'],
            ':agence_arrivee_id' => $data['agence_arrivee_id'],
            ':date_depart' => $data['date_depart'],
            ':date_arrivee' => $data['date_arrivee'],
            ':places_total' => $data['places_total'],
            ':places_disponibles' => $data['places_total'],
            ':user_id' => $data['user_id'],
        ]);
    }

    public function update(int $id, array $data): void {
        $sql = "
            UPDATE trajets SET
                agence_depart_id = :agence_depart_id,
                agence_arrivee_id = :agence_arrivee_id,
                date_depart = :date_depart,
                date_arrivee = :date_arrivee,
                places_total = :places_total,
                places_disponibles = :places_total
            WHERE id = :id
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':agence_depart_id' => $data['agence_depart_id'],
            ':agence_arrivee_id' => $data['agence_arrivee_id'],
            ':date_depart' => $data['date_depart'],
            ':date_arrivee' => $data['date_arrivee'],
            ':places_total' => $data['places_total'],
            ':id' => $id,
        ]);
    }
}