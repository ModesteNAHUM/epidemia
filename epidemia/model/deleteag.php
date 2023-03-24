
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <style>
        body{
            background-image: url(../assets/images/backg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100vh;
            color: white;
            
        }
        section{
            display: flex;
            justify-content: center;
        }
        h1{
            background-color: #00009257;
            display: flex;
            justify-content: center;
            
        }
        a{
            text-decoration: none;
            color: cornflowerblue;
            display: flex;
            justify-content: center;
            border: 10px solid white;
            background-color: white;
            font-size: 20px;
            font-weight: 400;
            width: 30%;
            margin: 10px;
        }
        a:hover{
            text-decoration: none;
            color: cornflowerblue;
            display: flex;
            transition: 1.5s;
            justify-content: center;
            border: 10px solid white;
            border-radius: 10px;
            background-color: white;
            font-size: 25px;
            font-weight: 400;
            width: 30%;
            margin: 10px;
        }
    </style>
</head>

<?php
include_once("../repositories/db.php");
// Vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['type'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: ../views/adminconnect.php");
    exit();
}

// Vérifier si l'utilisateur est de type "admin"
if ($_SESSION['type'] != 'ADMIN') {
    // Si l'utilisateur n'est pas de type "admin", afficher un message d'erreur
    echo "<h1>Vous n'êtes pas autorisé à effectuer cette action.</h1>";
} else {
    // Si l'utilisateur est de type "admin", procéder à la suppression
    if (isset($_POST['login']) ){
        $login = $_GET['login'];
        $delete= mysqli_query($conn,"DELETE FROM `connexion` WHERE `login`='$login' LIMIT 1");
        if ($delete) {
            if (mysqli_affected_rows($conn) > 0) {
                echo "<h1>L'agent a été supprimée avec succès.</h1>";
            } else {
                echo "<h1>La colonne n'a pas été trouvée dans la table.</h1>";
            }
        } else {
            echo " <h1>Une erreur s'est produite lors de la suppression de la colonne.</h1>";
        }
    }
}


?>
<body>
    <section>
        <a href="../views/listagent.php">Afficher la liste des agents</a>
        <a href="../views/admindec.php"><button type="submit" value="deconnexion">Se Déconnecter</button></a>
    </section>

</body>
</html>