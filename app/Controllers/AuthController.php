<?php
declare(strict_types=1);

use App\Core\Database;
use App\Models\User;

class AuthController
{
    /**
     * Display login form
     *
     * @return void
     */
    public function showLogin(): void
    {
        require ROOT . '/app/Views/auth/login.php';
    }

    /**
     * Display login form
     *
     * @return void
     */
    public function login(): void
    {
        $pdo = Database::getInstance();
        $user = (new User($pdo))->findByEmail($_POST['email'] ?? '');

        if ($user && password_verify($_POST['password'] ?? '', $user['password'])) {
            $_SESSION['user'] = $user;
            header('Location: /');
            exit;
        }

        $error = 'Login incorrect';
        require ROOT . '/app/Views/auth/login.php';
    }

    /**
     * Logout current user
     *
     * @return void
     */
    public function logout(): void
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}