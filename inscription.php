<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Canardsound</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Inscription</h1>
    <?php
        if (isset($_GET['error'])) {
            echo "<p class='error'>" . htmlspecialchars($_GET['error']) . "</p>";
        }
    ?>
    <form action="inscription_action.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        <button type="submit">S'inscrire</button>
    </form>

    <script src="scripts.js"></script>
</body>
</html>
