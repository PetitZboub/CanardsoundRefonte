<?php
session_start();
require_once 'bdd.php';

if (!isset($_SESSION['utilisateur']) || !$_SESSION['utilisateur']['est_admin']) {
  // Si l'utilisateur n'est pas connecté ou n'est pas admin, redirection vers la page d'accueil
  header('Location: acceuil.php');
  exit();
}

// Récupération de tous les signalements enregistrés dans la base de données
$stmt = $bdd->prepare("SELECT s.id, s.id_utilisateur, s.id_musique, s.raison, m.titre, u.nom, u.prenom FROM Signalements s INNER JOIN Musiques m ON s.id_musique = m.id INNER JOIN Utilisateurs u ON s.id_utilisateur = u.id");
$stmt->execute();
$signalements = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Signalements</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Signalements</h1>
  </header>

  <main>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Titre</th>
          <th>Utilisateur</th>
          <th>Raison</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($signalements as $signalement): ?>
          <tr>
            <td><?= $signalement['id'] ?></td>
            <td><?= $signalement['titre'] ?></td>
            <td><?= $signalement['nom'] . ' ' . $signalement['prenom'] ?></td>
            <td><?= $signalement['raison'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>

  <footer>
    <?php if (isset($_SESSION['utilisateur'])): ?>
      <form action="deconnexion.php" method="post">
        <button type="submit">Déconnexion</button>
      </form>
    <?php endif; ?>
  </footer>
</body>
</html>
