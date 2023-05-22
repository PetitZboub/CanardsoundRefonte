<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Ajoutez la connexion à la base de données ici
$servername="localhost";
$username="root";
$password="";
$dbname ="canardsound";
$conn = new mysqli($servername, $username, $password, $dbname);

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Vérifiez si l'utilisateur existe déjà
$check_user = "SELECT * FROM Utilisateurs WHERE email = ?";
$stmt = $conn->prepare($check_user);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: inscription.php?error=Email déjà utilisé.");
} else {
    $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $insert_user = "INSERT INTO Utilisateurs (nom, prenom, email, mot_de_passe) VALUES (?,?, ?, ?)";
    $stmt = $conn->prepare($insert_user);
    $stmt->bind_param("ssss", $nom, $prenom, $email, $hashed_password);

    if ($stmt->execute()) {
        header("Location: connexion.php");
    } else {
        header("Location: inscription.php?error=Erreur lors de l'inscription.");
    }
}

$stmt->close();
$conn->close();