<?php require ROOT . '/app/Views/layout/header.php'; ?>

<h1 class="mb-4">Trajets disponibles</h1>

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

<?php if (isset($_SESSION['user'])) : ?>
    <div class="mb-3">
        <a href="/trajets/create" class="btn btn-success">
            ➕ Créer un trajet
        </a>
    </div>
<?php endif; ?>

<?php if (empty($trajets)) : ?>

    <div class="alert alert-info">
        Aucun trajet disponible pour le moment.
    </div>

<?php else : ?>

<div class="table-responsive">

<table class="table table-striped table-hover align-middle">

<thead class="table-dark">
<tr>
<th>Agence départ</th>
<th>Date départ</th>
<th>Agence arrivée</th>
<th>Date arrivée</th>
<th>Places disponibles</th>
<th>Actions</th>
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

<td>

<button
class="btn btn-sm btn-primary" title="Détails"
data-bs-toggle="modal"
data-bs-target="#trajetModal<?= (int)$trajet['id'] ?>"
>
<i class="bi bi-eye"></i>
</button>

<?php if (
    isset($_SESSION['user']) &&
    (
        $_SESSION['user']['role'] === 'ADMIN' ||
        $_SESSION['user']['id'] === (int)$trajet['user_id']
    )
) : ?>

<a
href="/trajets/<?= (int)$trajet['id'] ?>/edit"
class="btn btn-warning" title="Modifier"
>
<i class="bi bi-pencil"></i>
</a>

<form
method="POST"
action="/trajets/<?= (int)$trajet['id'] ?>/delete"
style="display:inline;"
onsubmit="return confirm('Supprimer ce trajet ?');"
>
<button class="btn btn-danger" title="Supprimer">
<i class="bi bi-trash"></i>
</button>
</form>

<?php endif; ?>

</td>

</tr>

<?php endforeach; ?>

</tbody>
</table>

</div>

<?php endif; ?>

<?php foreach ($trajets as $trajet) : ?>

<!-- Modal détails trajet -->

<div class="modal fade" id="trajetModal<?= (int)$trajet['id'] ?>" tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title">
Détails du trajet
</h5>

<button
type="button"
class="btn-close"
data-bs-dismiss="modal"
></button>

</div>

<div class="modal-body">

<h6 class="mb-3">Informations conducteur</h6>

<p>
<strong>Nom :</strong>
<?= htmlspecialchars($trajet['nom']) ?>
</p>

<p>
<strong>Prénom :</strong>
<?= htmlspecialchars($trajet['prenom']) ?>
</p>

<p>
<strong>Email :</strong>
<?= htmlspecialchars($trajet['email']) ?>
</p>

<p>
<strong>Téléphone :</strong>
<?= htmlspecialchars($trajet['telephone'] ?? '') ?>
</p>

<p>
<strong>Places totales :</strong>
<?= (int)$trajet['places_total'] ?>
</p>

</div>

<div class="modal-footer">

<button
class="btn btn-secondary"
data-bs-dismiss="modal"
>
Fermer
</button>

</div>

</div>

</div>

</div>

<?php endforeach; ?>

<?php require ROOT . '/app/Views/layout/footer.php'; ?>