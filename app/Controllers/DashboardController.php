<?php
declare(strict_types=1);

namespace App\Controllers;

class DashboardController {
    public function index(): void {
        echo "<h1>Dashboard</h1>";
        echo "<p>Bienvenue " . htmlspecialchars($_SESSION['user']['email']) . "</p";
        echo '<a href="/logout">Logout</a>';
    }
}