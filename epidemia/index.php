<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      * {
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    padding: 0px;
    margin: 0px;
    text-decoration: none;
    text-justify: newspaper;
}

.sect1 {
    background-image: url(assets/images/backg.jpg);
    width: 100%;
    height: 100vh;
    object-fit: initial;
    background-repeat: no-repeat;
}

.container {
    border-radius: 20px;
    background-color: rgb(0 63 126 / 15%);
    color: white;
    display: inline-flex;
    flex-wrap: nowrap;
    flex-direction: column;
    justify-content: flex-start;
    width: 50%;
    padding: 6%;
    align-items: stretch;
    position: relative;
    left: 25%;
    top: 15%;
}

.container .lien {
    text-decoration: none;
    color: white;
}

.container .lien:hover {
    text-decoration: none;
    color: cornflowerblue;
    background-color: white;
    transition: 1.5s;
    border-radius: 15%;
    border: 2% solid blueviolet;
    padding: 2%;
}
    </style>
    <title>Document</title>
</head>
<body>

    <section class="sect1">
        <div class="container">
           
            <h1 class="title">BIENVENUE SUR EPIDEMIA</h1>
            <h2 class="subtitle">Votre plateforme de recensement de régionale</h2>
            <h3 class="text1">Veuillez déclinez votre identité pour continuer</h3>
            <h2><a href="views/adminconnect.php" class="lien"> Je suis un ADMINISTRATEUR  </a></h2>
            <h2><a href="views/agsconnect.php" class="lien">Je suis un AGENT DE SANTÉ </a> </h2> 
           
        </div>
    </section>

</body>
<script>
$(document).ready(function() {
  $('.rss-scroll').rss('https://www.lemonde.fr/coronavirus-2019-ncov/rss_full.xml', {
    limit: 3,
    ssl: true,
    effect: 'slideFastSynced'
  });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-rss/3.3.0/jquery.rss.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>