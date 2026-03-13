<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le trajet</title>
</head>
<body>
<?php require ROOT . '/app/Views/layout/header.php'; ?>

<h1 class="mb-4">Modifier le trajet</h1>

<?php if (!empty($_SESSION['error'])) : ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form method="POST" action="/trajets/<?= (int)$trajet['id'] ?>/update">

<div class="row mb-3">

<div class="col-md-6">

<label class="form-label">Agence de départ</label>

<select
name="agence_depart_id"
class="form-select"
required
>

<?php foreach ($agences as $agence) : ?>

<option
value="<?= (int)$agence['id'] ?>"
<?= $agence['id'] == $trajet['agence_depart_id'] ? 'selected' : '' ?>
>
<?= htmlspecialchars($agence['nom']) ?>
</option>

<?php endforeach; ?>

</select>

</div>


<div class="col-md-6">

<label class="form-label">Agence d'arrivée</label>

<select
name="agence_arrivee_id"
class="form-select"
required
>

<?php foreach ($agences as $agence) : ?>

<option
value="<?= (int)$agence['id'] ?>"
<?= $agence['id'] == $trajet['agence_arrivee_id'] ? 'selected' : '' ?>
>
<?= htmlspecialchars($agence['nom']) ?>
</option>

<?php endforeach; ?>

</select>

</div>

</div>


<div class="row mb-3">

<div class="col-md-6">

<label class="form-label">Date de départ</label>

<input
type="datetime-local"
name="date_depart"
class="form-control"
value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_depart'])) ?>"
required
>

</div>


<div class="col-md-6">

<label class="form-label">Date d'arrivée</label>

<input
type="datetime-local"
name="date_arrivee"
class="form-control"
value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_arrivee'])) ?>"
required
>

</div>

</div>


<div class="mb-4">

<label class="form-label">Nombre de places</label>

<input
type="number"
name="places_total"
class="form-control"
min="1"
value="<?= (int)$trajet['places_total'] ?>"
required
>

</div>


<div class="d-flex gap-2">

<button
type="submit"
class="btn btn-primary"
>
Enregistrer
</button>

<a
href="/"
class="btn btn-secondary"
>
<i class="bi bi-arrow-left"></i>
Retour
</a>

</div>

</form>

<?php require ROOT . '/app/Views/layout/footer.php'; ?>

</body>
</html>