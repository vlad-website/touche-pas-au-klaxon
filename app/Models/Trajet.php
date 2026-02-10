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

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}