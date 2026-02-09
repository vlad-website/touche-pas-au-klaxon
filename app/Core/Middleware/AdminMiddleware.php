<?php
declare(strict_types=1);

namespace App\Core\Middleware;

class AdminMiddleware {
    public function handle(): void {
        session_start();

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ADMIN') {
            http_response_code(403);
            echo 'Accès interdit';
            exit;
        }
    }
}