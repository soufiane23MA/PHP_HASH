 <!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
 </head>
 <body>
	<form action="traitement.php?action=login" method="POST">
		<label for="email">email</label>
		<input type="email" id="email" name="email"><br>
		<label for="pass1">Mot de passe</label>
		<input type="password" id="pass1" name="pass1"><br>
		<input type="submit" value="Enregistrer">
	</form>
 </body>
 </html>