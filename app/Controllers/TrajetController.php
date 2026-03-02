<?php
declare(strict_types=1);

use App\Core\Database;
use App\Models\Trajet;
use App\Models\Agence;

class TrajetController
{
    private function auth(): void
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }

    public function index(): void
    {
        $pdo = Database::getInstance();
        $trajets = (new Trajet($pdo))->getAvailableFutureTrajetsWithAuthor();
        require ROOT . '/app/Views/trajets/index.php';
    }

    public function create(): void
    {
        $this->auth();
        $pdo = Database::getInstance();
        $agences = (new Agence($pdo))->getAll();
        require ROOT . '/app/Views/trajets/create.php';
    }

    public function store(): void
    {
        $this->auth();

        $data = $_POST;
        $data['user_id'] = $_SESSION['user']['id']; // 🔥 ВАЖНО

        $pdo = Database::getInstance();
        (new Trajet($pdo))->create($data);

        header('Location: /trajets');
        exit;
    }
    public function edit($id): void
    {
        $this->auth();

        $pdo = Database::getInstance();

        $trajetModel = new Trajet($pdo);
        $trajet = $trajetModel->findById((int)$id);

        if (!$trajet) {
            header('Location: /trajets');
            exit;
        }

        // 🔥 ВАЖНО
        $agences = (new Agence($pdo))->getAll();

        require ROOT . '/app/Views/trajets/edit.php';
    }

    public function update($id): void
    {
        $this->auth();

        $pdo = Database::getInstance();
        (new Trajet($pdo))->update((int)$id, $_POST);

        header('Location: /trajets');
        exit;
    }

    public function delete($id): void
    {
        $this->auth();

        $pdo = Database::getInstance();
        (new Trajet($pdo))->delete((int)$id);

        header('Location: /trajets');
        exit;
    }
}