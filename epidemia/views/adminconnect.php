<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulaire de connexion</title>
    <style>
        body {
            background-color: LightSkyBlue;

        }
		form {
			margin: auto;
            margin-top:80px;
			width: 500px;
			padding: 80px;
			background-color: #f2f2f2;
			border-radius: 7px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
		}
		h1 {
			text-align: center;
			color: #444;
			font-size: 24px;
			margin-top: 0;
		}
		input[type="text"], input[type="password"] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
            font-size: 20px;
            font-family: Verdana;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
            font-size: 20px;
        
        }
		input[type="submit"]:hover {
			background-color: #45a049;
		}
		.link {
			display: block;
			text-align: center;
			margin-top: 12px;
			text-decoration: none;
			font-size: 20px;
			color: blue;
		}
        .link:hover {
            color: red;
        }
		.log .pwd{
			font-size: 20px;
			font-weight: 500;
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
            width: 15%;
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
            width: 20%;
            margin: 10px;
        }

	</style>
</head>

<body>
    <h1>Connexion</h1>
	<a href="../index.php" class="lien">Accueil</a>
    <form action="../repositories/adminconnexion.php" method="post">
    <input type="text" name="type" id="type" value="ADMIN" readonly><br><br>
        <label for="login" class="log">Login :</label>
        <input type="text" name="login" id="login" autocomplete="new-password" required><br><br>
        <label for="password" class="pwd">Mot de passe :</label>
        <input type="password" name="password" id="password" autocomplete="new-password" required><br><br>
        <input type="submit" value="Se connecter"> 
		
    </form>
</body>
</html>
