<?php require ROOT . '/app/Views/layout/header.php'; ?>

<h1 class="mb-4">Créer une agence</h1>

<?php if (!empty($_SESSION['error'])) : ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form method="POST" action="/admin/agences/store">

<div class="mb-3">

<label class="form-label">Nom de l'agence</label>

<input
type="text"
name="nom"
class="form-control"
required
>

</div>

<div class="d-flex gap-2">

<button
type="submit"
class="btn btn-success"
>
<i class="bi bi-plus-lg"></i>
Créer
</button>

<a
href="/admin/agences"
class="btn btn-secondary"
>
<i class="bi bi-arrow-left"></i>
Retour
</a>

</div>

</form>

<?php require ROOT . '/app/Views/layout/footer.php'; ?>