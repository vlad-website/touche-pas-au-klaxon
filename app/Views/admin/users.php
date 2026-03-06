<?php require ROOT . '/app/Views/layout/header.php'; ?>

<h2>Liste des utilisateurs</h2>

<table class="table table-striped">

<thead>
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Rôle</th>
</tr>
</thead>

<tbody>

<?php foreach ($users as $user) : ?>

<tr>

<td><?= (int)$user['id'] ?></td>

<td>
<?= htmlspecialchars($user['prenom']) ?>
<?= htmlspecialchars($user['nom']) ?>
</td>

<td><?= htmlspecialchars($user['email']) ?></td>

<td><?= htmlspecialchars($user['role']) ?></td>

</tr>

<?php endforeach; ?>

</tbody>
</table>
<a href="/admin">← Retour</a>

<?php require ROOT . '/app/Views/layout/footer.php'; ?>

<!-- <a href="/admin">← Retour</a> -->