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
// include_once("../views/listpays.php");
// include_once("../views/ajout_pays.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete= mysqli_query($conn,"DELETE FROM `personnes` WHERE `id`='$id' LIMIT 1");
    if ($delete) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<h1>Le patient a été supprimée avec succès.</h1>";
        } else {
            echo "<h1>La colonne n'a pas été trouvée dans la table.</h1>";
        }
    } else {
        echo " <h1>Une erreur s'est produite lors de la suppression de la colonne.</h1>";
    }
}


?>
<body>
    <section>
        <a href="../views/listpatient.php">Afficher la liste des patients</a>
    </section>

</body>
</html>