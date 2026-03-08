<?php
declare(strict_types=1);

namespace App\Core\Middleware;

class AuthMiddleware {
    public function handle(): void {

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }
}
