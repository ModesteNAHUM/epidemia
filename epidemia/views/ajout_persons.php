<?php

session_start();
if (!$_SESSION['login']) {
	header('Location: ../views/agsconnect.php');
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire de Personne</title>
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
		
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
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
            color: white;
            display: flex;
            justify-content: center;
            border: 10px solid white;
			border-radius: 5px;
            background-color: cornflowerblue;
            font-size: 20px;
            font-weight: 400;
          padding: 12px;
            margin: 10px 0px;
        }
        .lien:hover{
            text-decoration: none;
            color: white;
            display: flex;
            transition: 1.5s;
            justify-content: center;
            border: 10px solid white;
            border-radius: 10px;
            background-color: blueviolet;
            font-size: 25px;
            font-weight: 400;
          
            margin: 10px 0px;
        }
       
	</style>
</head>


<body>

	<h1 style="text-align:center;">Formulaire d'Enregistrement de Patient</h1>
	<form method="post" action="../repositories/addperson.php">
		<label for="nomP">Matricule:</label>
		<input class="form-control" type="text" name="matricule" readonly value="mat#@<?=date('d:m:y h:m:s') ?>">
		<label for="nomP">Nom:</label>
		<input type="text" name="nomP" id="nomP" placeholder="Entrer le Nom" required><br>
		
		<label for="prenomP">Prénom:</label>
		<input type="text" name="prenomP" id="prenomP" placeholder="Entrer le Prenom" required><br>
		
		<label for="numTel">Numéro de téléphone:</label>
		<input type="text" name="numTel" id="numTel"  placeholder="Entrer le Numéro de Téléphone" required><br>
		
		<label for="sexe">Sexe:</label><br>
		<div>
			<input type="radio" name="sexe" id="sexe_f" value="F" required>
			<label for="sexe_f">Femme</label>

			<input type="radio" name="sexe" id="sexe_h" value="H" required>
			<label for="sexe_h">Homme</label><br><br>
		</div>
		
		<div>
      <label for="">Resultat D'analyse</label>
        <select name="Res_Analyse" class="form-select" aria-label="Default select example">
          <option selected>Sélectionnez le resultat de l'analyse</option>
          <option value="Negatif">Negatif</option>
          <option value="Symptomatique">Symptomatique</option>
          <option value="Positif">Positif</option>
        </select>
        </div>

		<div>
    <label for="">Pays</label>
      <select id="pays" name="pays" class="form-select" aria-label="Default select example" onchange="miseAJourVilles()">
        <option  name="pays" value="">Sélectionnez un pays</option>
        <option value="Sénégal">Sénégal</option>
        <option value="Mali">Mali</option>
        <option value="Gambie">Gambie</option>
        <option value="Mauritanie">Mauritanie</option>
                  <!-- Ajoutez d'autres options de pays ici -->
      </select>
      </div>
      <div>
    <label for="">Zone Occupée</label>
      <select id="villes" name="villes" class="form-select" aria-label="Default select example" onchange="miseAJourHopitaux()">
        <option name="villes" value="">Sélectionnez une ville</option>
          <!-- Les options de ville seront mises à jour dynamiquement -->
        </select>
        </div>
        <div>
    <label for="">Point de Surveillance  Occupée</label>
      <select id="hopitaux" name="hopitaux" class="form-select" aria-label="Default select example">
        <option name="hopitaux" value="">Sélectionnez un point de surveillance</option>
          <!-- Les options d'hôpitaux seront mises à jour dynamiquement -->
      </select>
      </div>
		
		<input type="submit" name="enregistrer" value="Enregistrer">
    <a href="agsdec.php" class="lien" value="deconnexion">Se Déconnecter</a>
		<a href="../views/listpatient.php" class="lien">Afficher la liste des Patients</a>
	</form>
	
</body>

<script>
  const villesParPays = {
    Sénégal: ["Dakar", "Kaolack", "Thies", "Kolda", "Matam"],
    Mali: ["Bamako", "Gao", "Tomboucktou", "Kidal", "Nioro"],
    Gambie: ["Banjul", "Kanifing", "Kuntaur", "Brikama", "Basse"],
    Mauritanie: ["Adrar", "Gorgol", "Trarza", "Assaba", "Tiris_Zemmour"],
    // Ajoutez d'autres pays et villes ici
  };
  
 
  const hopitauxParVille = {
    Dakar: ["Hôpital Abass Ndao", "Hôpital Fann", "Hôpital Principal","Hoggie"],
    Kaolack: ["Hôpital kaolack","Hôpital El Hadji Ibrahima Niass","Sara Nimzatt"],
    Matam: ["Hôpital régional de matam"],
	Thies: ["Hôpital Régional El Hadji Ahmadou Sakhir NDIEGUENE de Thiès","Hôpital Saint Jean de Dieu","Hopital Barthimee"],
	Kolda: ["HOPITAL REGIONAL DE KOLDA","CGM KOLDA"],
    Bamako: ["Hôpital Ibrahim B Keïta","CENTRE HOSPITALIER UNIVERSITAIRE DU POINT G","Centre Hospitalo-Universitaire Gabriel Touré"],
    Gao: ["Cicr"],
    Banjul: ["Hôpital royal victoria", "Edward Francis Hospital"],
    Adrar: ["Cac Adrar"],
    // Ajoutez d'autres villes et hôpitaux ici
  };
  
  function miseAJourVilles() {
    const paysSelectionne = document.getElementById("pays").value;
    const listeVilles = villesParPays[paysSelectionne] || [];
    const selectVilles = document.getElementById("villes");
    selectVilles.innerHTML = "<option value=''>Sélectionner une ville</option>";
    for (const ville of listeVilles) {
      const option = document.createElement("option");
      option.value = ville;
      option.textContent = ville;
      selectVilles.appendChild(option);
    }
    miseAJourHopitaux();
  }
  
  function miseAJourHopitaux() {
    const villeSelectionnee = document.getElementById("villes").value;
    const listeHopitaux = hopitauxParVille[villeSelectionnee] || [];
    const selectHopitaux = document.getElementById("hopitaux");
    selectHopitaux.innerHTML = "<option value=''>Sélectionner un hôpital</option>";
    for (const hopital of listeHopitaux) {
      const option = document.createElement("option");
      option.value = hopital;
      option.textContent = hopital;
      selectHopitaux.appendChild(option);
    }
  }
</script>
</html>
