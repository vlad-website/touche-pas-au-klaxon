<?php require ROOT . '/app/Views/layout/header.php'; ?>

<h1 class="mb-4">Gestion des agences</h1>


<?php if (!empty($_SESSION['success'])) : ?>
<div class="alert alert-success">
<?= htmlspecialchars($_SESSION['success']) ?>
</div>
<?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])) : ?>
<div class="alert alert-danger">
<?= htmlspecialchars($_SESSION['error']) ?>
</div>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>


<div class="mb-3 d-flex gap-2">

<a
href="/admin/agences/create"
class="btn btn-success"
>
<i class="bi bi-plus-lg"></i>
Créer une agence
</a>

<a
href="/admin"
class="btn btn-secondary"
>
<i class="bi bi-arrow-left"></i>
Retour
</a>

</div>


<table class="table table-striped table-hover align-middle">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Nom</th>
<th style="width:160px;">Actions</th>
</tr>

</thead>


<tbody>

<?php if (empty($agences)) : ?>

<tr>
<td colspan="3">Aucune agence.</td>
</tr>

<?php else : ?>

<?php foreach ($agences as $agence) : ?>

<tr>

<td><?= (int)$agence['id'] ?></td>

<td><?= htmlspecialchars($agence['nom']) ?></td>

<td>

<div class="d-flex gap-1">

<a
href="/admin/agences/<?= (int)$agence['id'] ?>/edit"
class="btn btn-sm btn-warning"
title="Modifier"
>
<i class="bi bi-pencil"></i>
</a>

<form
method="POST"
action="/admin/agences/<?= (int)$agence['id'] ?>/delete"
onsubmit="return confirm('Supprimer cette agence ?');"
>

<button
class="btn btn-sm btn-danger"
title="Supprimer"
>
<i class="bi bi-trash"></i>
</button>

</form>

</div>

</td>

</tr>

<?php endforeach; ?>

<?php endif; ?>

</tbody>

</table>

<?php require ROOT . '/app/Views/layout/footer.php'; ?>