<h1>Gestion des trajets (Admin)</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Départ</th>
        <th>Arrivée</th>
        <th>Places</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($trajets as $trajet) : ?>
        <tr>
            <td><?= $trajet['id'] ?></td>
            <td><?= $trajet['depart'] ?></td>
            <td><?= $trajet['arrivee'] ?></td>
            <td><?= $trajet['places_disponibles'] ?></td>
            <td>
                <form method="POST"
                      action="/admin/trajets/<?= $trajet['id'] ?>/delete"
                      style="display:inline;">
                    <button>Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/admin">← Retour</a>