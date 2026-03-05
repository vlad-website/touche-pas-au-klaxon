<h1>Créer une agence</h1>

<?php if (!empty($_SESSION['error'])) : ?>
    <p style="color:red;">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </p>
<?php endif; ?>

<form method="POST" action="/admin/agences/store">
    <label>Nom de l'agence :</label>
    <input type="text" name="nom" required>

    <button type="submit">Créer</button>
</form>

<a href="/admin/agences">← Retour</a>