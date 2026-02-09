<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    
    <h1>Connexion</h1>

    <?php if (!empty($error)) : ?>
        <!-- Message d'erreur affiché si login incorrect -->
        <p style="color:red;">
            <?=  htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="/login">
        <!-- Champ email -->
        <label>Email :</label><br>
        <input type="email" name="email" required><br><br>

        <!-- Champ mot de passe -->
        <label>Mot de passe :</label><br>
        <input type="password" name="password" required><br><br>

        <!-- Bouton de validation -->
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>