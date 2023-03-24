<?php

session_start();
if (!$_SESSION['login']) {
	header('Location: adminconnect.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ajouter un pays</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
  div {
    margin: 3%;
    padding: 1%;
  }
  div select{
    margin: 2%;
    padding: 1%;
  }
  div select option{
   font-size: 15px;
   font-weight: 400;
   font-family: Verdana, Geneva, Tahoma, sans-serif;
  }
   section {
    margin: -3% 0% 0% 0%;
    background-image: url(../assets/images/cdm1.jpg);
    background-repeat: no-repeat;
    object-fit: contain;
    width: 100%;
    height: 120vh;
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

<body>
<section>
<div class="card mt-4 container col-md-4 bg-white ">
  <h5 class=" white-text text-center py-4">
    <strong>AJOUT DE PAYS</strong>
  </h5>
  <form method="POST" action="../repositories/pays.php">
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
    <label for="">Ville</label>
      <select id="villes" name="villes" class="form-select" aria-label="Default select example" onchange="miseAJourHopitaux()">
        <option name="villes" value="">Sélectionnez une ville</option>
          <!-- Les options de ville seront mises à jour dynamiquement -->
        </select>
        </div>
        <div>
    <label for="">Point de Surveillance</label>
      <select id="hopitaux" name="hopitaux" class="form-select" aria-label="Default select example">
        <option name="hopitaux" value="">Sélectionnez un point de surveillance</option>
          <!-- Les options d'hôpitaux seront mises à jour dynamiquement -->
      </select>
      </div>
  
        <div class="mb-3" style=" display:flex; justify-content: center;">
          <button type="reset" class="btn btn-danger" name="cancel" style="margin-right: 20%;"> Annuler </button>
          <button type="submit" class="btn btn-success" name="ajouter"> Envoyer </button>
        </div> 
</form>
<a href="admindec.php" class="lien"><button type="submit" value="deconnexion">Se Déconnecter</button></a>
</div>
</section>
</body>


<script>
  const villesParPays = {
    Sénégal: ["Dakar", "Kaolack", "saint-louis", "kolda", "Matam"],
    Mali: ["Bamako", "Gao", "Tomboucktou", "Kidal", "Nioro"],
    Gambie: ["Banjul", "Kanifing", "Kuntaur", "Brikama", "Basse"],
    Mauritanie: ["Adrar", "Gorgol", "Trarza", "Assaba", "Tiris_Zemmour"],
    // Ajoutez d'autres pays et villes ici
  };
  
 
  const hopitauxParVille = {
    Dakar: ["Hôpital Abass Ndao", "Hôpital Fann", "Hôpital Principal"],
    Kaolack: ["Hôpital kaolack"],
    Matam: ["Hôpital HRM"],
    Bamako: ["Hospital Ibrahim b keita"],
    Gao: ["cicr"],
    Banjul: ["Hôpital royal victoria", "edward francis hospital"],
    Adrar: ["cac Adrar"],
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
