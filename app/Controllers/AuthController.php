<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Database;
use App\Models\User;

class AuthController {
    public function showLogin(): void {
        require ROOT . '/app/Views/auth/login.php';
    }

    public function login(): void {
        session_start();

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $pdo = Database::getInstance();

        $userModel = new User($pdo);

        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'role' => $user['role']
            ];

            //header('Location: /dashboard');
            header('Location: /');
            exit;
        }

        $error = "Email ou mot de passe incorrect";

        require ROOT . '/Views/auth/login.php';
    }

    public function logout(): void {
        session_start();
        session_destroy();
        
        header('Location: /login');
        exit;
    }
}