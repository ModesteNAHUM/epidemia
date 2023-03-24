<?php
session_start();
include "db.php";
$type = $_POST['type'];
$login = $_POST['login'];
$password = sha1($_POST['password']);

// Requête pour vérifier si les informations sont correctes
$sql = "SELECT * FROM connexion WHERE login='$login' AND password='$password' AND type='$type'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Les informations sont correctes, redirection vers la page d'accueil";
    $_SESSION['type']= $type;
    $_SESSION['login']= $login;
    $_SESSION['password']= $password;
    header("Location: ../views/agent.php");
} else {
    // Les informations sont incorrectes, affichage d'un message d'erreur
    echo "Login ou mot de passe incorrect. Veuillez réessayer<br><br>";
    echo '<a href="../views/agsconnect.php"> Back to home </a>';
}

?>
