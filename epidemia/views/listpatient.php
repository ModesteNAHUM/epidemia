<?php
session_start();
if (!$_SESSION['login']) {
	header('Location: ../views/agsconnect.php');
} 

//including the database connection file
include("../repositories/db.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($conn, "SELECT * FROM personnes ORDER BY id DESC"); // using mysqli_query instead
$sql = "SELECT villes, COUNT(*) AS nb_personnes FROM personnes GROUP BY villes";
$count = mysqli_query($conn, $sql);

if (!$count) {
    die("La requête a échoué : " . mysqli_error($conn));
  }
 

?>

<!doctype html>
<html lang="fr">
  <head>
	<title>Liste des Patients</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        body{
            background-image: url(../assets/images/backg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100vh;
            color: white;
            
        }
        h1{
            background-color: #00009257;
            display: flex;
            justify-content: center;
            
        }
        .lien{
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
        .lien:hover{
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
  <body>

	<div class="container">
		
<a href="../views/ajout_persons.php" class="lien">Ajouter un nouveau patient</a><br/><br/>
<a href="../views/listzone.php" class="lien">Consulter la classification par Zone</a><br/><br/>

	<table class="table table-dark table-bordered" width='100%' border=3>

	<tr bgcolor='#CCCCCC'>
		<td style="text-align: center;">N°</td>
        <td style="text-align: center;">MATRICULE</td>
        <td style="text-align: center;">NOM</td>
        <td style="text-align: center;">PRENOM</td>
        <td style="text-align: center;">TÉLÉPHONE</td>
        <td style="text-align: center;">SEXE</td>
        <td style="text-align: center;">RÉSULTAT D'ANALYSE</td>
		<td style="text-align: center;">PAYS</td>
		<td style="text-align: center;" >VILLE</td>
		<td style="text-align: center;">POINT DE SURVEILLANCE</td>
		<td style="text-align: center;">DELETE</td>
        <td style="text-align: center;">MODIFIER</td>
		
	</tr>
	<?php
    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
    while ($res = mysqli_fetch_array($result)) {
        echo "<tr>";
		echo "<td style=text-align:center;>".$res['id']."</td>";
        echo "<td style=text-align:center;>".$res['matricule']."</td>";
        echo "<td style=text-align:center;>".$res['nomp']."</td>";
        echo "<td style=text-align:center;>".$res['prenomp']."</td>";
        echo "<td style=text-align:center;>".$res['tel']."</td>";
        echo "<td style=text-align:center;>".$res['sexe']."</td>";
        echo "<td style=text-align:center;>".$res['res_analyse']."</td>";
        echo "<td style=text-align:center;>".$res['pays']."</td>";
        echo "<td style=text-align: center;>".$res['villes']."</td>";
        echo "<td style=text-align: center;>".$res['hopitaux']."</td>";
       

		?>
		
        <td style="text-align: center; text-decoration:none;"><a href="../model/deletep.php?id=<?php echo $res['id'];?>"><button type="button" class="btn btn-outline-light" name="supr"><i class="fa fa-trash" aria-hidden="true"></i></button></a></td>
        <td style="text-align: center; text-decoration:none;"><a href="../views/modifier_patient.php?id=<?php echo $res['id'];?>"><button type="button" class="btn btn-outline-light" name="modifier">Modifier</button></a></td>


	<?php  while($row = mysqli_fetch_assoc($count)) {
            echo "<h3 class='lien'>"."Ville : " . $row["villes"] . " - Nombre de personnes : " . $row["nb_personnes"] . "<br>"."</h3>";
          }
          ?>

	<?php
    }
    ?>
	</table>
	</div>
	  
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/6ba2a3af52.js" crossorigin="anonymous"></script>
  </body>
</html>

