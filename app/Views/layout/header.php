<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title><?= $title ?? 'Touche pas au klaxon' ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg">

<div class="container">

<a class="navbar-brand" href="/">
Touche pas au klaxon
</a>

<div class="d-flex align-items-center">

<?php if (!empty($_SESSION['user'])) : ?>

    <?php if ($_SESSION['user']['role'] === 'ADMIN') : ?>

        <a href="/admin/users" class="btn btn-outline-light btn-sm me-2">
            Utilisateurs
        </a>

        <a href="/admin/agences" class="btn btn-outline-light btn-sm me-2">
            Agences
        </a>

        <a href="/admin/trajets" class="btn btn-outline-light btn-sm me-2">
            Trajets
        </a>

    <?php else : ?>

        <a href="/trajets/create" class="btn btn-success btn-sm me-2">
            Nouveau trajet
        </a>

    <?php endif; ?>

<span class="text-white me-2">

<?= htmlspecialchars($_SESSION['user']['prenom']) ?>
<?= htmlspecialchars($_SESSION['user']['nom']) ?>

</span>

<a href="/logout" class="btn btn-danger btn-sm">
Déconnexion
</a>

<?php else : ?>

<a href="/login" class="btn btn-primary btn-sm">
Connexion
</a>

<?php endif; ?>

</div>

</div>

</nav>

<div class="container mt-4">