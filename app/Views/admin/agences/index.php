<?php require ROOT . '/app/Views/layout/header.php'; ?>

<div class="container mt-4">

    <h1 class="mb-4">Gestion des agences</h1>

    <!-- Flash messages -->
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


    <div class="mb-3">
        <a href="/admin/agences/create" class="btn btn-success">
            ➕ Créer une agence
        </a>

        <a href="/admin" class="btn btn-secondary">
            ← Retour admin
        </a>
    </div>


    <table class="table table-striped table-bordered">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th style="width:200px;">Actions</th>
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

                    <td>
                        <?= (int)$agence['id'] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($agence['nom']) ?>
                    </td>

                    <td>

                        <a 
                            href="/admin/agences/<?= (int)$agence['id'] ?>/edit"
                            class="btn btn-sm btn-warning"
                        >
                            Modifier
                        </a>


                        <form
                            method="POST"
                            action="/admin/agences/<?= (int)$agence['id'] ?>/delete"
                            style="display:inline;"
                            onsubmit="return confirm('Supprimer cette agence ?');"
                        >

                            <button class="btn btn-sm btn-danger">
                                Supprimer
                            </button>

                        </form>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php endif; ?>

        </tbody>

    </table>

</div>

<?php require ROOT . '/app/Views/layout/footer.php'; ?>