<?php
// Vérification de la connexion de l'utilisateur
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header('Location: connexion.php');
    exit();
}

// Récupération des musiques ajoutées aux coups de cœur de l'utilisateur
require_once('config.php');
$connexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$connexion) {
    die('Erreur de connexion à la base de données');
}

$utilisateurId = $_SESSION['utilisateur']['id'];
$requete = "SELECT Musiques.* FROM Musiques INNER JOIN CoupsDeCoeur ON Musiques.id = CoupsDeCoeur.musique_id WHERE CoupsDeCoeur.utilisateur_id = $utilisateurId";
$resultat = mysqli_query($connexion, $requete);
$musiques = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coups de coeur</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <header>
        <h1>Coups de coeur de
            <?php echo $_SESSION['utilisateur']['prenom'] . ' ' . $_SESSION['utilisateur']['nom']; ?>
        </h1>
        <nav>
            <ul>
                <li><a href="acceuil.php">Accueil</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="musiques">
            <?php
            // Affichage des musiques ajoutées aux coups de cœur
            if (count($musiques) == 0) {
                echo '<p>Aucune musique ajoutée aux coups de cœur.</p>';
            } else {
                foreach ($musiques as $musique) {
                    echo '<div class="musique">';
                    echo '<img src="' . $musique['cover'] . '">';
                    echo '<div class="infos-musique">';
                    echo '<p class="titre">' . $musique['titre'] . '</p>';
                    echo '<p class="artiste">' . $musique['artiste'] . '</p>';
                    echo '<button class="play-button" onclick="playMusique(' . $musique['id'] . ')">Lire</button>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <? include "footer.php" ?>
    </main>

</body>

</html>