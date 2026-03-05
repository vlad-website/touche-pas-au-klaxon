<h1>Liste des utilisateurs</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Role</th>
    </tr>

    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['role']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="/admin">← Retour</a>