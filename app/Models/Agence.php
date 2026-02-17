<?php
declare(strict_types=1);

namespace App\Models;

use PDO;

class Agence {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * @return array
     */

    public function getAll(): array {
        $sql = "SELECT id, nom FROM agences ORDER BY nom ASC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}