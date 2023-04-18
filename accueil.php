<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>MonDeezer - Accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
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
            $requete = $pdo->query('SELECT * FROM titres WHERE id=1 ORDER BY RAND() LIMIT 5');
            $musiques = $requete->fetchAll();
            $requete->closeCursor();

            if (!empty($musiques)) {
                echo '<h2>Musiques aléatoires</h2>';
                echo '<div class="musiques-liste">';
                foreach ($musiques as $musique) {
                    echo '<div class="musique">';
                    echo '<img class="cover" src="' . $musique['cover'] . '">';
                    echo '<h3>' . $musique['titre'] . '</h3>';
                    echo '<p>' . $musique['artiste'] . '</p>';
                    echo '<button class="play-button" onclick="togglePlayPause()' . $musique['id'] . ')">Lire</button>';
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>

            <?php
            // Vérification de l'utilisateur connecté
            
            if (isset($_SESSION['utilisateur'])) {
                $utilisateur = $_SESSION['utilisateur'];
                $user_id = $utilisateur['id'];
                echo '<h2>Mes informations</h2>';
                echo '<ul>';
                echo '<li>Nom : ' . $utilisateur['nom'] . '</li>';
                echo '<li>Prénom : ' . $utilisateur['prenom'] . '</li>';
                echo '<li>Email : ' . $utilisateur['email'] . '</li>';
                echo '<li><a href="changer_mot_de_passe.php">Changer le mot de passe</a></li>';
                echo '</ul>';
            } else {
                echo '<h2>Connexion</h2>';
                include('connexion.php');
                echo '<h2>Inscription</h2>';
                include('inscription.php');
            }
            ?>

            <?php
            // Affichage de la liste de "Coup de cœur" de l'utilisateur
            if (isset($_SESSION['utilisateur'])) {
                $requete = $bdd->prepare('SELECT musique.* FROM musique JOIN coup_de_coeur ON musique.id = coup_de_coeur.musique_id WHERE coup_de_coeur.utilisateur_id = ?');
                $requete->execute(array($user_id));
                $coup_de_coeur = $requete->fetchAll();
                $requete->closeCursor();

                if (!empty($coup_de_coeur)) {
                    echo '<h2>Mes coups de cœur</h2>';
                    echo '<div class="musiques-liste">';
                    foreach ($coup_de_coeur as $musique) {
                        echo '<div class="musique">';
                        echo '<img class="cover" src="' . $musique['cover'] . '">';
                        echo '<button class="play-button" onclick="playMusique(' . $musique['id'] . ')">Lire</button>';
                        echo '<button class="ajouter-coup-de-coeur" onclick="ajouterCoupDeCoeur(' . $musique['id'] . ')">Ajouter aux coups de cœur</button>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            }
            ?>
        </div>

        <footer>
            <div class="player">
                <audio id="audioPlayer" src="" data-musique-id=""></audio>
                <div class="player-controls">
                    <button id="player-prev" onclick="playPrev()">&#171;</button>
                    <button id="player-play" onclick="playPause()">Play/Pause</button>
                    <button id="player-next" onclick="playNext()">&#187;</button>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>