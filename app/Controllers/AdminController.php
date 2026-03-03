<?php
declare(strict_types=1);

use App\Core\Database;
use App\Models\User;
use App\Models\Agence;
use App\Models\Trajet;

class AdminController {
    private function authAdmin(): void {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            http_response_code(403);
            exit('Accès interdit');
        }
    }

    public function dashboard(): void {
        $this->authAdmin();
        require ROOT . '/app/Views/admin/dashboard.php';
    }

    public function users(): void {
        $this->authAdmin();
        $pdo = Database::getInstance();
        $users = (new User($pdo))->getAll();
        require ROOT . '/app/Views/admin/users.php';
    }

    public function agences(): void {
        $this->authAdmin();
        $pdo = Database::getInstance();
        $agences = (new Agence($pdo))->getAll();
        require ROOT . '/app/Views/admin/agences.php';
    }

    public function trajets(): void {
        $this->authAdmin();
        $pdo = Database::getInstance();
        $trajets = (new Trajet($pdo))->getAll();
        require ROOT . '/app/Views/admin/trajets.php';
    }

    public function deleteTrajet(int $id): void {
        $this->authAdmin();
        $pdo = Database::getInstance();
        (new Trajet($pdo))->delete($id);

        $_SESSION['success'] = 'Trajet supprimé par l\'administrateur.';
        header('Location: /admin/trajets');
        exit;
    }
}