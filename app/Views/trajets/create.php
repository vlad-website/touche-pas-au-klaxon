<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un trajet</title>
</head>
<body>

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
        <?= htmlspecialchars($_SESSION['user']['prenom'] ?? '') ?>
        <?= htmlspecialchars($_SESSION['user']['nom'] ?? '') ?><br>
        <?= htmlspecialchars($_SESSION['user']['email']) ?><br>
        <?= htmlspecialchars($_SESSION['user']['telephone'] ?? '') ?>
    </p>

    <label>Agence de départ</label><br>
    <select name="agence_depart" required>
        <?php foreach ($agences as $agence) : ?>
            <option value="<?= (int)$agence['id'] ?>">
                <?=  htmlspecialchars($agence['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Agence d’arrivée</label><br>
    <select name="agence_arrivee" required>
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