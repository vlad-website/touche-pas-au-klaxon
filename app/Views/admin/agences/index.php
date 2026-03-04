<h1>Gestion des agences</h1>

<a href="/admin/agences/create">Créer une agence</a>

<table border="1">
    <tr>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($agences as $agence) : ?>
        <tr>
            <td><?= htmlspecialchars($agence['nom']) ?></td>
            <td>
                <a href="/admin/agences/<?= $agence['id'] ?>/edit">
                    Modifier
                </a>

                <form method="POST"
                      action="/admin/agences/<?= $agence['id'] ?>/delete"
                      style="display:inline;">
                    <button>Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/admin">← Retour admin</a>