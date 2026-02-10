<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Database;
use App\Models\Trajet;

class TrajetController {
    public function index(): void {
        $pdo = Database::getInstance();

        $trajetModel = new Trajet($pdo);

        $trajets = $trajetModel->getAvailableFutureTrajets();

        require __DIR__ . '/../Views/trajets/index.php';
    }
}