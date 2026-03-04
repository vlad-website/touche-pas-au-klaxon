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

    public function create(array $data): void {
        $stmt = $this->pdo->prepare("
            INSERT INTO agence (nom)
            VALUES (:nom)
        ");
        $stmt->execute($data);
    }

    public function findById(int $id): ?array {
        $stmt = $this->pdo->prepare("
            SELECT * FROM agences WHERE id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    public function update(int $id, array $data): void {
        $stmt = $this->pdo->prepare("
            UPDATE agences SET nom = :nom WHERE id = :id
        ");
        $stmt->execute([
            'nom' => $data['nom'],
            'id' => $id
        ]);
    }

    public function delete(int $id): void {
        $stmt = $this->pdo->prepare("
            DELETE FROM agences WHERE id = :id
        ");
        $stmt->execute(['id' => $id]);
    }
}