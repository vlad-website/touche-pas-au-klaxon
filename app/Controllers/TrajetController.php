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

    private function checkOwner(array $trajet): void
    {
        // L'administrateur dispose d'un accès complet
        if ($_SESSION['user']['role'] === 'ADMIN') {
            return;
        }

        // Utilisateur régulier - uniquement le leur trajets
        if ((int)$trajet['user_id'] !== (int)$_SESSION['user']['id']) {
            http_response_code(403);
            echo 'Accès interdit';
            exit;
        }
    }

    /**
     * Display list of available future trajets
     *
     * @return void
     */
    public function index(): void
    {
        $pdo = Database::getInstance();
        $trajets = (new Trajet($pdo))->getAvailableFutureTrajetsWithAuthor();
        require ROOT . '/app/Views/trajets/index.php';
    }

    /**
     * Show form to create a trajet
     *
     * @return void
     */
    public function create(): void
    {
        $this->auth();

        $pdo = Database::getInstance();
        $agences = (new Agence($pdo))->getAll();

        require ROOT . '/app/Views/trajets/create.php';
    }

    /**
     * Store a new trajet in database
     *
     * @return void
     */
    public function store(): void
    {
        $this->auth();

        // Vérification des champs obligatoires
        if (
            empty($_POST['agence_depart_id']) ||
            empty($_POST['agence_arrivee_id']) ||
            empty($_POST['date_depart']) ||
            empty($_POST['date_arrivee']) ||
            empty($_POST['places_total'])
        ) {
            $_SESSION['error'] = 'Tous les champs sont obligatoires.';
            header('Location: /trajets/create');
            exit;
        }

        // Cohérence agences
        if ((int)$_POST['agence_depart_id'] === (int)$_POST['agence_arrivee_id']) {
            $_SESSION['error'] = "Les agences doivent être différentes.";
            header('Location: /trajets/create');
            exit;
        }

        // Cohérence dates
        $dateDepart = strtotime($_POST['date_depart']);
        $dateArrivee = strtotime($_POST['date_arrivee']);

        if ($dateArrivee <= $dateDepart) {
            $_SESSION['error'] = "La date d'arrivée doit être après la date de départ.";
            header('Location: /trajets/create');
            exit;
        }

        if ($dateDepart <= time()) {
            $_SESSION['error'] = "La date de départ doit être dans le futur.";
            header('Location: /trajets/create');
            exit;
        }

        // Places
        if ((int)$_POST['places_total'] < 1) {
            $_SESSION['error'] = "Le nombre de places doit être supérieur à 0.";
            header('Location: /trajets/create');
            exit;
        }

        // Création
        $data = [
            'agence_depart_id'   => (int)$_POST['agence_depart_id'],
            'agence_arrivee_id'  => (int)$_POST['agence_arrivee_id'],
            'date_depart'        => $_POST['date_depart'],
            'date_arrivee'       => $_POST['date_arrivee'],
            'places_total'       => (int)$_POST['places_total'],
            'places_disponibles' => (int)$_POST['places_total'],
            'user_id'            => (int)$_SESSION['user']['id'],
        ];

        $pdo = Database::getInstance();
        (new Trajet($pdo))->create($data);

        $_SESSION['success'] = 'Trajet créé avec succès.';
        header('Location: /trajets');
        exit;
    }

    /**
     * Update an existing trajet
     *
     * @param int $id
     * @return void
     */
    public function update(int $id): void
    {
        $this->auth();

        $pdo = Database::getInstance();
        $trajetModel = new Trajet($pdo);
        $trajet = $trajetModel->findById($id);

        if (!$trajet) {
            header('Location: /trajets');
            exit;
        }

        $this->checkOwner($trajet);

        // Vérification des champs obligatoires
        if (
            empty($_POST['agence_depart_id']) ||
            empty($_POST['agence_arrivee_id']) ||
            empty($_POST['date_depart']) ||
            empty($_POST['date_arrivee']) ||
            empty($_POST['places_total'])
        ) {
            $_SESSION['error'] = 'Tous les champs sont obligatoires.';
            header("Location: /trajets/$id/edit");
            exit;
        }

        // Cohérence agences
        if ((int)$_POST['agence_depart_id'] === (int)$_POST['agence_arrivee_id']) {
            $_SESSION['error'] = "Les agences doivent être différentes.";
            header("Location: /trajets/$id/edit");
            exit;
        }

        // Cohérence dates
        $dateDepart = strtotime($_POST['date_depart']);
        $dateArrivee = strtotime($_POST['date_arrivee']);

        if ($dateArrivee <= $dateDepart) {
            $_SESSION['error'] = "La date d'arrivée doit être après la date de départ.";
            header("Location: /trajets/$id/edit");
            exit;
        }

        // Places
        $newTotal = (int)$_POST['places_total'];

        if ($newTotal < 1) {
            $_SESSION['error'] = "Le nombre de places doit être supérieur à 0.";
            header("Location: /trajets/$id/edit");
            exit;
        }

        // Combien de réservations ont déjà été effectuées
        $reserved = (int)$trajet['places_total'] - (int)$trajet['places_disponibles'];

        if ($newTotal < $reserved) {
            $_SESSION['error'] = "Impossible de réduire le nombre de places en dessous des réservations existantes.";
            header("Location: /trajets/$id/edit");
            exit;
        }

        // Update
        $trajetModel->update($id, [
            'agence_depart_id'  => (int)$_POST['agence_depart_id'],
            'agence_arrivee_id' => (int)$_POST['agence_arrivee_id'],
            'date_depart'       => $_POST['date_depart'],
            'date_arrivee'      => $_POST['date_arrivee'],
            'places_total'      => (int)$_POST['places_total'],
        ]);

        $_SESSION['success'] = 'Trajet modifié avec succès.';
        header('Location: /trajets');
        exit;
    }

    /**
     * Delete a trajet
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->auth();

        $pdo = Database::getInstance();
        $trajetModel = new Trajet($pdo);
        $trajet = $trajetModel->findById($id);

        if (!$trajet) {
            header('Location: /trajets');
            exit;
        }

        $this->checkOwner($trajet);

        $trajetModel->delete($id);

        $_SESSION['success'] = 'Trajet supprimé avec succès.';
        header('Location: /trajets');
        exit;
    }
}