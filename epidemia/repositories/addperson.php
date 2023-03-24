<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement Patient</title>
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
include "../repositories/db.php";
$matricule = $_POST['matricule'];
$nom = $_POST['nomP'];
$prenom = $_POST['prenomP'];
$tel = $_POST['numTel'];
$sexe = $_POST['sexe'];
$res_analyses = $_POST['Res_Analyse'];
$pays = $_POST['pays'];
$villes = $_POST['villes'];
$hopitaux = $_POST['hopitaux'];

if (isset($_POST['enregistrer'])) { 
  $matricule =  mysqli_real_escape_string($conn, $_POST['matricule']);  
  $nom =  mysqli_real_escape_string($conn, $_POST['nomP']);  
  $prenom =  mysqli_real_escape_string($conn, $_POST['prenomP']);  
  $tel =  mysqli_real_escape_string($conn, $_POST['numTel']);  
  $sexe =  mysqli_real_escape_string($conn, $_POST['sexe']);  
  $res_analyses =  mysqli_real_escape_string($conn, $_POST['Res_Analyse']);   
  $pays =  mysqli_real_escape_string($conn, $_POST['pays']);
  $villes =  mysqli_real_escape_string($conn, $_POST['villes']);
  $hopitaux =  mysqli_real_escape_string($conn, $_POST['hopitaux']);

  $result= "INSERT INTO `personnes`(`matricule`, `nomp`, `prenomp`, `tel`, `sexe`, `res_analyse`, `pays`, `villes`, `hopitaux`) VALUES ('$matricule','$nom','$prenom','$tel','$sexe','$res_analyses','$pays','$villes','$hopitaux')";
 

  if ($conn->query($result)===TRUE) {
    echo"<h1>Le patient à été enregistré avec succès...</h1>";  
 }else {
    echo" Failed!!!!";
 }

}

?>

<body>
    <section>
    <a href="../views/listpatient.php">Afficher la liste des Patients</a>
    <a href="../views/Ajout_SuperAgent.php">Ajouter un autre patient</a>
    </section>
</body>
</html>