
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="traitement.php?action=register" method="POST">

	<label for="Pseudo">Pseudo</label>
	<input type="text" id="pseudo" name="pseudo"> <br>
	<label for="email">email</label>
	<input type="email" id="email" name="email"><br>
	<label for="pass1">Mot de passe</label>
	<input type="password" id="pass1" name="pass1"><br>
	<label for="pass2">Confirmer votre Mot de passe</label>
	<input type="password" id="pass2" name="pass2"><br>
	
	<input type="submit" name="submit" value="Enregistrer">
	</form>
	
</body>
</html>