<?php
//including the database connection file
include("../repositories/db.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($conn, "SELECT * FROM connexion ORDER BY login DESC"); // using mysqli_query instead


?>

<!doctype html>
<html lang="fr">
  <head>
	<title>Liste des Agents</title>
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
		
<a href="../views/ajout_agent.php" class="lien">Ajouter un nouvel agent</a><br/><br/>
<a href="../views/agsconnect.php" class="lien"> Se connecter</a><br/><br/>

	<table class="table table-dark table-bordered" width='100%' border=3>

	<tr bgcolor='#CCCCCC'>
		
		<td style="text-align: center;">TYPE</td>
		<td style="text-align: center;" >LOGIN</td>
		<td style="text-align: center;" >DELETE</td>
	
		
	</tr>
	<?php
    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
    while ($res = mysqli_fetch_array($result)) {
        echo "<tr>";
		echo "<td style=text-align:center;>".$res['type']."</td>";
        echo "<td style=text-align:center;>".$res['login']."</td>";
       

		?>
		
        <td style="text-align: center; text-decoration:none;"><a href="../model/deleteag.php?login=<?php echo $res['login'];?>"><button type="button" class="btn btn-outline-light" name="supr"><i class="fa fa-trash" aria-hidden="true"></i></button></a></td>

	

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

