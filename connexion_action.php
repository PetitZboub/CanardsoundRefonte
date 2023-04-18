<?php
// Ajoutez la connexion à la base de données ici
// $conn = new mysqli($servername, $username, $password, $dbname);

$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Vérifiez si l'utilisateur existe dans la base de données
$check_user = "SELECT * FROM Utilisateurs WHERE email = ?";
$stmt = $conn->prepare($check_user);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($mot_de_passe, $user['mot_de_passe'])) {
        // Démarrez la session et enregistrez les informations de l'utilisateur
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_prenom'] = $user['prenom'];
        $_SESSION['user_est_admin'] = $user['est_admin'];

        // Redirigez l'utilisateur vers la page d'accueil
        header("Location: acceuil.html");
    } else {
        header("Location: connexion.php?error=Mot de passe incorrect.");
    }
} else {
    header("Location: connexion.php?error=Email non trouvé.");
}

$stmt->close();
$conn->close();
