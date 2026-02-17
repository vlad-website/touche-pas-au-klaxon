<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Trajets disponibles</title>
</head>
<body>

<h1>Trajets disponibles</h1>

<?php if (isset($_SESSION['user'])) : ?>
    <p>
        <a href="/trajets/create">➕ Créer un trajet</a>
    </p>
<?php endif; ?>

<?php if (empty($trajets)) : ?>
    <!-- Si aucun trajet disponible -->
    <p>Aucun trajet disponible pour le moment.</p>
<?php else : ?>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Agence départ</th>
                <th>Date départ</th>
                <th>Agence arrivée</th>
                <th>Date arrivée</th>
                <th>Places disponibles</th>
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
                            type="button"
                            class="btn btn-sm btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#trajetModal<?= (int)$trajet['id'] ?>"
                        >
                            Détails
                        </button>

                        <?php if (
                            isset($_SESSION['user']) &&
                            $_SESSION['user']['id'] === (int)$trajet['user_id']
                        ) : ?>
                            <td>
                                <a href="/trajets/<?= (int)$trajet['id'] ?>/edit"
                                class="btn btn-sm btn-warning">
                                    Modifier
                                </a>

                                <form
                                    method="POST"
                                    action="/trajets/<?= (int)$trajet['id'] ?>/delete"
                                    style="display:inline;"
                                    onsubmit="return confirm('Supprimer ce trajet ?');"
                                >
                                    <button class="btn btn-sm btn-danger">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        <?php endif; ?>

                    </td>
                </tr>





            <!-- ВРЕМЕННО -->
             <?php if (!empty($_SESSION['success'])) : ?>
                <p style="color:green;">
                    <?= htmlspecialchars($_SESSION['success']) ?>
                </p>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>







            <div class="modal fade" id="trajetModal<?= (int)$trajet['id'] ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <!-- Заголовок модального окна -->
                        <div class="modal-header">
                            <h5 class="modal-title">Детали траекта</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                    
                        <!-- Основное содержимое -->
                        <div class="modal-body">

                            <p>
                                <strong>Водитель:</strong>
                                <?= htmlspecialchars($trajet['prenom'] . ' ' . $trajet['nom']) ?>
                            </p>

                            <p>
                                <strong>Email:</strong>
                                <?= htmlspecialchars($trajet['email']) ?>
                            </p>

                            <p>
                                <strong>Телефон:</strong>
                                <?= htmlspecialchars($trajet['telephone'] ?? '') ?>
                            </p>

                            <p>
                                <strong>Всего мест:</strong>
                                <?= (int)$trajet['places_total'] ?>
                            </p>

                        </div>

                        <!-- Кнопки -->
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">
                                Закрыть
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>