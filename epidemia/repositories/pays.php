<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes des Pays</title>
    <style>
        body{
            background-image: url(../assets/images/cdm1.jpg);
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
include "../repositories/db.php";
$pays = $_POST['pays'];
$villes = $_POST['villes'];
$hopitaux = $_POST['hopitaux'];

if (isset($_POST['ajouter'])) {
  $pays =  mysqli_real_escape_string($conn, $_POST['pays']);
  $villes =  mysqli_real_escape_string($conn, $_POST['villes']);
  $hopitaux =  mysqli_real_escape_string($conn, $_POST['hopitaux']);

  $result= "INSERT INTO ajout_pays(pays,villes,hopitaux) VALUES ('$pays','$villes','$hopitaux')";
 

  if ($conn->query($result)===TRUE) {
    echo"<h1>Pays - Zone et Points de surveillance crée avec succes.......</h1>";  
 }else {
    echo"country creation failed......";
 }

}
?>

<body>
    <section>
    <a href="../views/listpays.php">Afficher la liste des pays</a>
    <a href="../views/ajout_pays.php">Ajouter un autre pays</a>
    </section>
</body>
</html>