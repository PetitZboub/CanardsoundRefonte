<?php
session_start();
require_once 'bdd.php';

if (isset($_SESSION['utilisateur']) && isset($_POST['idMusique']) && isset($_POST['raison'])) {
    $idMusique = $_POST['idMusique'];
    $raison = $_POST['raison'];

    // Vérifier que la musique existe dans la base de données
    $stmt = $bdd->prepare("SELECT * FROM Musiques WHERE id = :idMusique");
    $stmt->bindParam(':idMusique', $idMusique);
    $stmt->execute();
    $musique = $stmt->fetch();

    if ($musique) {
        // Ajouter le signalement à la base de données
        $stmt = $bdd->prepare("INSERT INTO Signalements (id_utilisateur, id_musique, raison) VALUES (:idUtilisateur, :idMusique, :raison)");
        $stmt->bindParam(':idUtilisateur', $_SESSION['utilisateur']['id']);
        $stmt->bindParam(':idMusique', $idMusique);
        $stmt->bindParam(':raison', $raison);
        $stmt->execute();

        // Rediriger vers la page de signalement avec un message de confirmation
        header('Location: signalement.php?id=' . $idMusique . '&success=1');
        exit();
    } else {
        // La musique n'existe pas, retourner à la page d'accueil
        header('Location: acceuil.php');
        exit();
    }
} else {
    // L'utilisateur n'est pas connecté ou les paramètres sont manquants, retourner à la page d'accueil
    header('Location: acceuil.php');
    exit();
}