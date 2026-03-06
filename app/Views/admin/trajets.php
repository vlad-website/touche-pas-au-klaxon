<?php require ROOT . '/app/Views/layout/header.php'; ?>

<h2>Gestion des trajets</h2>

<table class="table table-striped">

<thead>
<tr>
<th>ID</th>
<th>Départ</th>
<th>Arrivée</th>
<th>Date départ</th>
<th>Places</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php foreach ($trajets as $trajet) : ?>

<tr>

<td><?= (int)$trajet['id'] ?></td>

<td><?= htmlspecialchars($trajet['depart']) ?></td>

<td><?= htmlspecialchars($trajet['arrivee']) ?></td>

<td><?= htmlspecialchars($trajet['date_depart']) ?></td>

<td><?= (int)$trajet['places_disponibles'] ?></td>

<td>

<form method="POST"
action="/admin/trajets/<?= $trajet['id'] ?>/delete"
onsubmit="return confirm('Supprimer ce trajet ?')">

<button class="btn btn-danger btn-sm">
Supprimer
</button>

</form>

</td>

</tr>

<?php endforeach; ?>

</tbody>
</table>


<a href="/admin">← Retour</a>

<?php require ROOT . '/app/Views/layout/footer.php'; ?>