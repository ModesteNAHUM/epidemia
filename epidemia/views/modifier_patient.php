<?php
session_start();
if (!isset($_SESSION['login'])) {
	header('Location: ../views/agsconnect.php');
	exit();
}

// Vérifier si l'ID du patient a été fourni en paramètre
if (!isset($_GET['id'])) {
	header('Location: liste_patients.php');
	exit();
}
include("../repositories/db.php");

// Récupérer les informations actuelles du patient à modifier
$id = $_GET['id'];
$sql = "SELECT * FROM personnes WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
	// Le patient n'existe pas, redirection vers la liste des patients
	header('Location: listpatient.php');
	exit();
} else {
	$row = $result->fetch_assoc();
}

// Traitement du formulaire de modification du patient
if (isset($_POST['submit'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$numTel = $_POST['numTel'];
	$sexe = $_POST['sexe'];
	$resAnalyse = $_POST['resAnalyse'];
	$pays = $_POST['pays'];
	$ville = $_POST['ville'];
	$hopital = $_POST['hopital'];

	$sql = "UPDATE patients SET nom='$nom', prenom='$prenom', numTel='$numTel', sexe='$sexe', Res_Analyse='$resAnalyse', pays='$pays', ville='$ville', hopital='$hopital' WHERE id='$id'";
	if ($conn->query($sql) === TRUE) {
		// Redirection vers la liste des patients après la modification réussie
		header('Location: listpatient.php');
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Modifier Patient</title>
	<style>
		body {
			background-color: LightSkyBlue;
			height: 130vh;
		}
		
		form {
			margin: 0 auto;
			width: 50%;
			background-color: white;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
		}
		
		input[type=text], select {
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
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h2>Modifier Patient</h2>
	<form method="post">
		<label for="nom">Nom:</label>
		<input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($row['nom']); ?>" required>

		<label for="prenom">Prénom:</label>
		<input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($row['prenom']); ?>" required>

        <label for="numTel">Numéro de téléphone:</label>
	<input type="text" id="numTel" name="numTel" value="<?php echo htmlspecialchars($row['numTel']); ?>" required>

	<label for="sexe">Sexe:</label>
	<select id="sexe" name="sexe" required>
		<option value="Homme" <?php if ($row['sexe'] == 'Homme') echo 'selected'; ?>>Homme</option>
		<option value="Femme" <?php if ($row['sexe'] == 'Femme') echo 'selected'; ?>>Femme</option>
		<option value="Autre" <?php if ($row['sexe'] == 'Autre') echo 'selected'; ?>>Autre</option>
	</select>

	<label for="resAnalyse">Résultat d'analyse:</label>
	<input type="text" id="resAnalyse" name="resAnalyse" value="<?php echo htmlspecialchars($row['Res_Analyse']); ?>" required>

	<label for="pays">Pays:</label>
	<input type="text" id="pays" name="pays" value="<?php echo htmlspecialchars($row['pays']); ?>" required>

	<label for="ville">Ville:</label>
	<input type="text" id="ville" name="ville" value="<?php echo htmlspecialchars($row['ville']); ?>" required>

	<label for="hopital">Hôpital:</label>
	<input type="text" id="hopital" name="hopital" value="<?php echo htmlspecialchars($row['hopital']); ?>" required>

	<input type="submit" name="submit" value="Modifier">
</form>
</body>
</html>