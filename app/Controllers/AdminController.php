<?php
declare(strict_types=1);

use App\Core\Database;
use App\Models\User;
use App\Models\Agence;
use App\Models\Trajet;

class AdminController {
    private function authAdmin(): void {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ADMIN') {
            http_response_code(403);
            exit('Accès interdit');
        }
    }

    /**
     * Display admin dashboard
     *
     * @return void
     */
    public function dashboard(): void {
        $this->authAdmin();
        require ROOT . '/app/Views/admin/dashboard.php';
    }

    /**
     * Display list of users
     *
     * @return void
     */
    public function users(): void {
        $this->authAdmin();
        $pdo = Database::getInstance();
        $users = (new User($pdo))->getAll();
        require ROOT . '/app/Views/admin/users.php';
    }

    /**
     * Display agences management page
     *
     * @return void
     */
    public function agences(): void {
        $this->authAdmin();
        $pdo = Database::getInstance();
        $agences = (new Agence($pdo))->getAll();
        require ROOT . '/app/Views/admin/agences/index.php';
    }

    /**
     * Display trajets management page
     *
     * @return void
     */
    public function trajets(): void {
        $this->authAdmin();
        $pdo = Database::getInstance();
        $trajets = (new Trajet($pdo))->getAllWithAgences();
        require ROOT . '/app/Views/admin/trajets.php';
    }

    /**
     * Delete a trajet (admin)
     *
     * @param int $id
     * @return void
     */
    public function deleteTrajet(int $id): void {
        $this->authAdmin();
        $pdo = Database::getInstance();
        (new Trajet($pdo))->delete($id);

        $_SESSION['success'] = 'Trajet supprimé par l\'administrateur.';
        header('Location: /admin/trajets');
        exit;
    }

    /**
     * Display form to create agence
     *
     * @return void
     */
    public function createAgence(): void {
        $this->authAdmin();
        require ROOT . '/app/Views/admin/agences/create.php';
    }

    /**
     * Store new agence
     *
     * @return void
     */
    public function storeAgence(): void {
        $this->authAdmin();

        $nom = trim($_POST['nom']);

        if (empty($nom)) {
            $_SESSION['error'] = 'Le nom est obligatoire.';
            header('Location: /admin/agences/create');
            exit;
        }

        $pdo = Database::getInstance();
        $agenceModel = new Agence($pdo);

        if ($agenceModel->existsByName($nom)) {
            $_SESSION['error'] = 'Cette agence existe déjà.';
            header('Location: /admin/agences/create');
            exit;
        }

        $agenceModel->create(['nom' => $nom]);

        $_SESSION['success'] = 'Agence créée avec succès.';
        header('Location: /admin/agences');
        exit;
    }

    /**
     * Display form to edit agence
     *
     * @param int $id
     * @return void
     */
    public function editAgence(int $id): void {
        $this->authAdmin();

        $pdo = Database::getInstance();
        $agence = (new Agence($pdo))->findById($id);

        if (!$agence) {
            header('Location: /admin/agences');
            exit;
        }

        require ROOT . '/app/Views/admin/agences/edit.php';
    }

    /**
     * Update agence
     *
     * @param int $id
     * @return void
     */
    public function updateAgence(int $id): void {
        $this->authAdmin();

        $nom = trim($_POST['nom']);

        if (empty($nom)) {
            $_SESSION['error'] = 'Le nom est obligatoire.';
            header("Location: /admin/agences/$id/edit");
            exit;
        }

        $pdo = Database::getInstance();
        $agenceModel = new Agence($pdo);

        if ($agenceModel->existsByNameExceptId($nom, $id)) {
            $_SESSION['error'] = 'Une agence avec ce nom exite déjà.';
            header("Location: /admin/agences/$id/edit");
            exit;
        }

        $agenceModel->update($id, ['nom' => $nom]);

        $_SESSION['success'] = 'Agence modifiée avec succès.';
        header('Location: /admin/agences');
        exit;
    }

    /**
     * Delete agence
     *
     * @param int $id
     * @return void
     */
    public function deleteAgence(int $id): void {
        $this->authAdmin();

        $pdo = Database::getInstance();

        $trajetModel = new Trajet($pdo);
        if ($trajetModel->existsWithAgence($id)) {
            $_SESSION['error'] = "Impossible de supprimer une agence utilisée dans des trajets.";
            header('Location: /admin/agences');
            exit;
        }

        (new Agence($pdo))->delete($id);

        $_SESSION['success'] = 'Agence supprimée.';
        header('Location: /admin/agences');
        exit;
    }
}