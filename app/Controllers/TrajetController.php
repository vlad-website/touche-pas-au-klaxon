<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Database;
use App\Models\Trajet;

class TrajetController {
    public function index(): void {
        $pdo = Database::getInstance();

        $trajetModel = new Trajet($pdo);

        $trajets = $trajetModel->getAvailableFutureTrajetsWithAuthor();

        require __DIR__ . '/../Views/trajets/index.php';
    }

    public function delete(int $id): void {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $pdo = Database::getInstance();
        $trajetModel = new Trajet($pdo);

        $trajet = $trajetModel->findById($id);

        if (!$trajet) {
            header('Location: /');
            exit;
        }

        $trajetModel->delete($id);

        $_SESSION['succes'] = 'Trajet supprimé avec succès';

        header('Location: /');
        exit;
    }
}