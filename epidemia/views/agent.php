<?php

session_start();
if (!$_SESSION['login']) {
	header('Location: agsconnect.php');
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page d'Administrateur</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}

        section {
			margin: auto;
            margin-top:80px;
			width: 500px;
			padding: 80px;
			background-color: #F0E68C;
			border-radius: 7px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
		}

		h1 {
			text-align: center;
			margin-top: 50px;
			
		}

		.container {
			margin: 50px auto;
			max-width: 600px;
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			margin-bottom: 20px;
			font-size: 16px;
		}

		button:hover {
			background-color: #3e8e41;
		}
		button a{
			text-decoration: none;
			color: white;
		}
        .lien{
            text-decoration: none;
            color: cornflowerblue;
            display: flex;
            justify-content: center;
            border: 10px solid white;
            background-color: white;
            font-size: 15px;
            font-weight: 400;
            width: 30%;
            margin: 10px;
        }
        .lien:hover{
            text-decoration: none;
            color: red;
            display: flex;
            transition: 1.5s;
            justify-content: center;
            border: 10px solid white;
            border-radius: 10px;
            background-color: white;
            font-size: 20px;
            font-weight: 400;
            width: 40%;
            margin: 10px;
        }

	</style>
</head>
<body>
	<h1><marquee behavior="alternate" width="50%">Vous êtes connecté en tant qu'Agent de Santé</marquee> </h1>
    <section>
        <div class="container">
            <h2>Que voulez vous faire?</h2>
          
            <a href="ajout_persons.php"><button > Ajouter une Personne</button></a>
            <a href="listzone.php"><button > Afficher les zones</button></a>
            <a href="listpatient.php"><button > Afficher les patients</button></a>
            <a href="listpays.php"><button > Afficher les pays</button></a>
            <a href="agsdec.php" class="lien" value="deconnexion">Se Déconnecter</a>

        </div>
    </section>
	

	
</body>


</html>
