<?php require ROOT . '/app/Views/layout/header.php'; ?>

<h1 class="mb-4">Créer un trajet</h1>

<?php if (!empty($_SESSION['error'])) : ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>


<h4 class="mb-3">Informations conducteur</h4>

<div class="row mb-4">

    <div class="col-md-6">
        <label class="form-label">Nom</label>
        <input
            type="text"
            class="form-control"
            value="<?= htmlspecialchars($_SESSION['user']['nom'] ?? '') ?>"
            readonly
        >
    </div>

    <div class="col-md-6">
        <label class="form-label">Prénom</label>
        <input
            type="text"
            class="form-control"
            value="<?= htmlspecialchars($_SESSION['user']['prenom'] ?? '') ?>"
            readonly
        >
    </div>

</div>

<div class="row mb-4">

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input
            type="text"
            class="form-control"
            value="<?= htmlspecialchars($_SESSION['user']['email'] ?? '') ?>"
            readonly
        >
    </div>

    <div class="col-md-6">
        <label class="form-label">Téléphone</label>
        <input
            type="text"
            class="form-control"
            value="<?= htmlspecialchars($_SESSION['user']['telephone'] ?? '') ?>"
            readonly
        >
    </div>

</div>


<form method="POST" action="/trajets/store">

<div class="row mb-3">

<div class="col-md-6">

<label class="form-label">Agence de départ</label>

<select
name="agence_depart_id"
class="form-select"
required
>

<?php foreach ($agences as $agence) : ?>

<option value="<?= (int)$agence['id'] ?>">
<?= htmlspecialchars($agence['nom']) ?>
</option>

<?php endforeach; ?>

</select>

</div>


<div class="col-md-6">

<label class="form-label">Agence d’arrivée</label>

<select
name="agence_arrivee_id"
class="form-select"
required
>

<?php foreach ($agences as $agence) : ?>

<option value="<?= (int)$agence['id'] ?>">
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
required
>

</div>


<div class="col-md-6">

<label class="form-label">Date d'arrivée</label>

<input
type="datetime-local"
name="date_arrivee"
class="form-control"
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
required
>

</div>


<div class="d-flex gap-2">

<button
type="submit"
class="btn btn-success"
>
Créer le trajet
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