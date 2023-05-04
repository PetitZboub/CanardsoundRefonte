<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Canardsound</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="scripts.js"></script>
</head>

<body>
    <?php session_start();
    include('header.php'); ?>

    <main>
        <div class="container">
            <?php
            // Connexion à la base de données
            $pdo = new PDO('mysql:host=localhost;dbname=canardsound', 'root', '');

            // Récupération des 5 musiques aléatoires
            $requete = $pdo->query('SELECT * FROM titres JOIN coveralbum ON titres.cover_album_id = coveralbum.id');
            $musiques = $requete->fetchAll();
            $requete->closeCursor();

            if (!empty($musiques)) {
                echo '<h2>Musiques aléatoires</h2>';
                echo '<div class="musiques-liste">';
                foreach ($musiques as $musique) {
                    echo '<div class="musique">';
                    echo '<img class="cover" src="' . $musique['url_image'] . '">';
                    echo '<h3>' . $musique['titre'] . '</h3>';
                    echo '<p>' . $musique['artiste'] . '</p>';
                    include 'player.php';
                }
                echo '</div>';
            }
            ?>
        </div>
    </main>
</body>

</html>