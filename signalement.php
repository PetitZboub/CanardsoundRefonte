<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signalement de musique</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="acceuil.php">Accueil</a></li>
        <?php
        if (isset($_SESSION['utilisateur'])) {
          echo '<li><a href="coup_de_coeur.php">Coups de coeur</a></li>';
          echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
        } else {
          echo '<li><a href="connexion.php">Connexion</a></li>';
          echo '<li><a href="inscription.php">Inscription</a></li>';
        }
        ?>
      </ul>
    </nav>
    <h1>Signalement de musique</h1>
  </header>

  <main>
    <?php
    if (isset($_SESSION['utilisateur'])) {
      if (isset($_GET['id'])) {
        $idMusique = $_GET['id'];
    ?>
        <form action="traitement_signalement.php" method="post">
          <input type="hidden" name="idMusique" value="<?= $idMusique ?>">
          <div>
            <label for="raison">Raison du signalement :</label>
            <textarea id="raison" name="raison" required></textarea>
          </div>
          <button type="submit">Signaler</button>
        </form>
    <?php
      } else {
        echo "<p>Aucune musique n'a été spécifiée pour le signalement.</p>";
      }
    } else {
      echo "<p>Vous devez être connecté pour signaler une musique.</p>";
    }
    ?>
  </main>

</body>

</html>
