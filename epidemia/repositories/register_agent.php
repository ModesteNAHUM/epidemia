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
$statut = $_POST['statut'];
$type = $_POST['type'];
$numagent = $_POST['numagent'];
$login = $_POST['login'];
$password = sha1($_POST['password']);

if (isset($_POST['register'])) { 
  $statut =  mysqli_real_escape_string($conn, $_POST['statut']);  
  $type =  mysqli_real_escape_string($conn, $_POST['type']);  
  $numagent =  mysqli_real_escape_string($conn, $_POST['numagent']);  
  $login =  mysqli_real_escape_string($conn, $_POST['login']);  
  $password =  mysqli_real_escape_string($conn, sha1($_POST['password']));  
  

  $result= "INSERT INTO `connexion`(`type`, `login`, `password`) VALUES ('$statut','$login','$password')";
 

  if ($conn->query($result)===TRUE) {
    echo"<h1>L'agent de Santé à été enregistré avec succès...</h1>";  
 }else {
    echo" Failed!!!!";
 }

}

?>

<body>
    <section>
    <a href="../views/listagent.php">Afficher la liste des Agents de Santé</a>
    <a href="../views/ajout_agent.php">Ajouter un autre agent de santé</a>
   
    </section>
</body>
</html>