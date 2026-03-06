<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un trajet</title>
</head>
<body>

<h4 class="mb-3">Informations conducteur</h4>

<div class="row mb-3">

    <div class="col-md-6">
        <label class="form-label">Nom</label>
        <input
            type="text"
            class="form-control"
            value="<?= htmlspecialchars($_SESSION['user']['nom'] ?? '') ?>"
            readonly
        >
    </div>

    <div class="col-md-6">
        <label class="form-label">Prénom</label>
        <input
            type="text"
            class="form-control"
            value="<?= htmlspecialchars($_SESSION['user']['prenom'] ?? '') ?>"
            readonly
        >
    </div>

</div>

<div class="row mb-4">

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input
            type="text"
            class="form-control"
            value="<?= htmlspecialchars($_SESSION['user']['email'] ?? '') ?>"
            readonly
        >
    </div>

    <div class="col-md-6">
        <label class="form-label">Téléphone</label>
        <input
            type="text"
            class="form-control"
            value="<?= htmlspecialchars($_SESSION['user']['telephone'] ?? '') ?>"
            readonly
        >
    </div>

</div>

<h1>Créer un trajet</h1>

<?php if (!empty($_SESSION['error'])) : ?>
    <p style="color:red;">
        <?=  htmlspecialchars($_SESSION['error']) ?>
    </p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form method="post" action="/trajets/store">

    <h3>Conducteur</h3>
    <p>
        <?= htmlspecialchars($_SESSION['user']['email']) ?>
    </p>

    <label>Agence de départ</label><br>
    <select name="agence_depart_id" required>
        <?php foreach ($agences as $agence) : ?>
            <option value="<?= (int)$agence['id'] ?>">
                <?=  htmlspecialchars($agence['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Agence d’arrivée</label><br>
    <select name="agence_arrivee_id" required>
        <?php foreach ($agences as $agence) : ?>
            <option value="<?= (int)$agence['id'] ?>">
                <?= htmlspecialchars($agence['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Date de départ</label><br>
    <input type="datetime-local" name="date_depart" required><br><br>

    <label>Date d'arrivée</label><br>
    <input type="datetime-local" name="date_arrivee" required><br><br>

    <label>Nombre de places</label><br>
    <input type="number" name="places_total" min="1" required><br><br>

    <button type="submit">Créer</button>
</form>   

<p><a href="/">← Retour</a></p>

</body>
</html>