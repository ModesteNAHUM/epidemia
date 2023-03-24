<?php

session_start();
if (!$_SESSION['login']) {
	header('Location: ../views/adminconnect.php');
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire d'agent</title>
	<style>
		body {
			background-color: LightSkyBlue;
		}
		
		form {
			margin: 0 auto;
			width: 50%;
			background-color: white;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
		}
		/* input[type=radio], */
		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		input[type=password]{
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			margin: 10px 0px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}
		
		input[type=submit]:hover {
			background-color: #45a049;
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
	<h1 style="text-align:center;">Formulaire d'Enregistrement d'agent</h1>
	<form method="post" action="../repositories/register_agent.php">
	<label for="statut">Statut:</label>
	<input type="text" name="statut" id="statut" value="AG-SANTE" readonly><br>
	<label for="type">Type d'agent</label>
		<select name="type" id="type" required>
			<option selected> Veuillez selectionnez le type d'agent  </option>
			<option value="AGS-"> AGS- </option>
			<option value="AG-"> AG- </option>
		</select><br><br>
		<select name="numagent" id="numagent" required>
			<option selected> Veuillez selectionnez le numero de l'agent </option>
			<option value="02-2023">02-2023</option>
			<option value="03-2023">03-2023</option>
			<option value="04-2023">04-2023</option>
			<option value="05-2023">05-2023</option>
			<option value="06-2023">06-2023</option>
			<option value="07-2023">07-2023</option>
			<option value="08-2023">08-2023</option>
			<option value="09-2023">09-2023</option>
			<option value="10-2023">10-2023</option>
			<option value="11-2023">11-2023</option>
			<option value="12-2023">12-2023</option>
			<option value="13-2023">13-2023</option>
			<option value="14-2023">14-2023</option>
			<option value="15-2023">15-2023</option>
		</select><br><br>
		<label for="Login">Login:</label>
		<input type="text" name="login" id="login" placeholder="login" readonly><br>
		<label for="Password">Mot de Passe:</label>
		<input type="password" name="password" id="password" placeholder="password" required><br>
		
		<input type="submit" name="register" value="Enregistrer">
	</form>
	<a href="admindec.php" class="lien"><button type="submit" value="deconnexion">Se Déconnecter</button></a>
</body>

<script>
// Récupération des éléments HTML
const typeInput = document.getElementById('type');
const numAgentInput = document.getElementById('numagent');
const loginInput = document.getElementById('login');

// Fonction pour mettre à jour la valeur du champ login
function updateLogin() {
    const typeValue = typeInput.value;
    const numAgentValue = numAgentInput.value;
    loginInput.value = typeValue + numAgentValue;
}

// Ajout d'un écouteur d'événement pour le champ type
typeInput.addEventListener('change', updateLogin);

// Ajout d'un écouteur d'événement pour le champ numagent
numAgentInput.addEventListener('change', updateLogin);
</script>
</html>
