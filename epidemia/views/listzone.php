<?php

session_start();
if (!$_SESSION['login']) {
	header('Location: ../views/agsconnect.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            background-image: url(../assets/images/ras.webp);
            background-repeat: no-repeat;
            object-fit: contain;
            background-size: cover;
            width: 100%;
            height: 100vh;
            color: white;
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-content: center;
            align-items: center;
        }
        section{
            border-radius: 20px;
            background-color: rgb(12 84 156 / 78%);
            color: white;
            display: inline-flex;
            flex-wrap: nowrap;
            flex-direction: column;
            justify-content: flex-start;
            width: 35%;
            padding: 6%;
            align-items: stretch;
            position: relative;
            font-size: 13px;
            font-weight: 600;
            font-family: Verdana, Geneva, Tahoma, sans-serif;

        }
        .s1{
            color: green;
            border: solid 10px white;
            background-color: white;
        }
        .s2{
            color: orange;
            border: solid 10px white;
            background-color: white;
        }
        .s3{
            color: red;
            border: solid 10px white;
            background-color: white;
        }
    </style>
</head>
<?php
include("../repositories/db.php");

// Requête SQL pour récupérer les résultats d'analyse par ville
$sql = "SELECT villes, COUNT(*) as total, 
        SUM(CASE WHEN res_analyse ='positif' THEN 1 ELSE 0 END) as positif, 
        SUM(CASE WHEN res_analyse ='negatif' THEN 1 ELSE 0 END) as negatif, 
        SUM(CASE WHEN res_analyse ='symptomatique' THEN 1 ELSE 0 END) as symptomatique 
        FROM personnes
        GROUP BY villes";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Affichage des résultats par ville avec le pourcentage de personnes positives, négatives et symptomatiques
    while($row = mysqli_fetch_assoc($result)) {
        $ville = $row["villes"];
        $total = $row["total"];
        $positif = $row["positif"];
        $negatif = $row["negatif"];
        $symptomatique = $row["symptomatique"];

        $positif_percent = ($positif / $total) * 100;
        $negatif_percent = ($negatif / $total) * 100;
        $symptomatique_percent = ($symptomatique / $total) * 100;
        echo "<section>";
        echo "Ville: " . $ville . "<br>";
        echo "<span class='s3'>Pourcentage de personnes positives: " . round($positif_percent, 2) . "%</span><br>";
        echo "<span class='s1'>Pourcentage de personnes négatives: " . round($negatif_percent, 2) . "%</span><br>";
        echo "<span class='s2'>Pourcentage de personnes symptomatiques: " . round($symptomatique_percent, 2) . "%</span><br>";

        // Détermination de la zone (vert, orange, rouge) en fonction du pourcentage de personnes positives
        if ($positif_percent < 5) {
            echo "<span class='s1'> Zone: Verte</span><br><br>";
        } elseif ($positif_percent >= 5 && $positif_percent <= 15) {
            echo "<span class='s2'> Zone: Orange </span><br><br>";
        } else {
            echo "<span class='s3'> Zone: Rouge</span><br><br>";
        }
    }
} else {
    echo "Aucun résultat d'analyse trouvé";
}
echo "</section>";
// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>

<body>
    
</body>
</html>