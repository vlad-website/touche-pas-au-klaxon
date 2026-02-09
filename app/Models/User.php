<?php
declare(strict_types=1);

namespace App\Models;

use PDO;

class User {
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findByEmail(string $email): array|false {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM users WHERE email = :email'
        );

        $stmt->execute([
            'email' => $email
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}