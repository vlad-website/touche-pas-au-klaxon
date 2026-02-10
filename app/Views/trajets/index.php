<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Trajets disponibles</title>
</head>
<body>

<h1>Trajets disponibles</h1>

<?php if (empty($trajets)) : ?>
    <!-- Si aucun trajet disponible -->
    <p>Aucun trajet disponible pour le moment.</p>
<?php else : ?>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Agence départ</th>
                <th>Date départ</th>
                <th>Agence arrivée</th>
                <th>Date arrivée</th>
                <th>Places disponibles</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trajets as $trajet) : ?>
                <tr>
                    <td><?= htmlspecialchars($trajet['agence_depart']) ?></td>
                    <td><?= htmlspecialchars($trajet['date_depart']) ?></td>
                    <td><?= htmlspecialchars($trajet['agence_arrivee']) ?></td>
                    <td><?= htmlspecialchars($trajet['date_arrivee']) ?></td>
                    <td><?= (int)$trajet['places_disponibles'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>