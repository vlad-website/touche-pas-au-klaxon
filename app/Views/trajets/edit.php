<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le trajet</title>
</head>
<body>
    
    <h1>Modifier le trajet</h1>

    <?php if (!empty($_SESSION['error'])) : ?>
        <p style="color:red;">
            <?=  htmlspecialchars($_SESSION['error']) ?>
        </p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form method="POST" action="/trajets/<?=  (int)$trajet['id'] ?>/update">
        <label>Agence de départ</label><br>
        <select name="agence_depart" required>
            <?php foreach ($agences as $agence) : ?>
                <option
                    value="<?=  (int)$agence['id'] ?>"
                    <?=  $agence['id'] == $trajet['agence_depart_id'] ? 'selected' : '' ?>
                >
                    <?=  htmlspecialchars($agence['nom']) ?>    
            </option>
        <?php endforeach; ?>
        </select><br><br>

        <label>Agence d'arrivée</label><br>
        <select name="agence_arrivee" required>
            <?php foreach ($agences as $agence) : ?>
                <option
                    value="<?= (int)$agence['id'] ?>"
                    <?=  $agence['id'] == $trajet['agence_arrivee_id'] ? 'selected' : '' ?>
                >
                    <?=  htmlspecialchars($agence['nom']) ?>    
            </option>
        <?php endforeach; ?>
        </select><br><br>

        <label>Date de départ</label><br>
        <input 
            type="datetime-local"
            name="date_depart"
            value="<?=  date('Y-m-d\TH:i', strtotime($trajet['date_depart'])) ?>"
            required
        ><br><br>

        <label>Date d'arrivée</label><br>
        <input
            type="datetime-local"
            name="date_arrivee"
            value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_arrivee'])) ?>"
            required
        ><br><br>

        <label>Nombre de places</label><br>
        <input
            type="number"
            name="places_total"
            min="1"
            value="<?=  (int)$trajet['places_total'] ?>"
            required
        ><br><br>

        <button type="submit">Enregistrer</button>
    </form>

    <p>
        <a href="/">← Retour</a>
    </p>
</body>
</html>