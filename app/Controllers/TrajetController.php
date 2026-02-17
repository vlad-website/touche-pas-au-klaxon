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

        $_SESSION['success'] = 'Trajet supprimé avec succès';

        header('Location: /');
        exit;
    }

    public function create(): void {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $pdo = Database::getInstance();

        $agenceModel = new \App\Models\Agence($pdo);
        $agences = $agenceModel->getAll();

        require __DIR__ . '/../Views/trajets/create.php';
    }

    public function store(): void {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        if (
            empty($_POST['agence_depart']) ||
            empty($_POST['agence_arrivee']) ||
            empty($_POST['date_depart']) ||
            empty($_POST['date_arrivee']) ||
            empty($_POST['places_total'])
        ) {
            $_SESSION['error'] = "Tous les champs sont obligatoires.";
            header('Location: /trajets/create');
            exit;
        }

        if ($_POST['agence_depart'] === $_POST['agence_arrivee']) {
            $_SESSION['error'] = "Les agences doivent être différentes.";
            header('Location: /trajets/create');
            exit;
        }

        
        if (strtotime($_POST['date_arrivee']) <= strtotime($_POST['date_depart'])) {
            $_SESSION['error'] = "La date d'arrivée doit être après le départ.";
            header('Location: /trajets/create');
            exit;
        }

        $pdo = Database::getInstance();

        $trajetModel = new Trajet($pdo);

        $trajetModel->create([
            'agence_depart_id' => (int)$_POST['agence_depart'],
            'agence_arrivee_id' => (int)$_POST['agence_arrivee'],
            'date_depart' => $_POST['date_depart'],
            'date_arrivee' => $_POST['date_arrivee'],
            'places_total' => (int)$_POST['places_total'],
            'user_id' => (int)$_SESSION['user']['id'],
        ]);

        $_SESSION['success'] = "Trajet créé avec succès.";

        header('Location: /');
        exit;
    }
}