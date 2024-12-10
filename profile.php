
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Mon profile</h1>
	<?php 
	if(isset($_SESSION["user"])  ){
		$infoUser = $_SESSION["user"];
		 
	} 
	?>
	<p>Pseudo :<?= $infoUser ["pseudo"]?></p>
	<p>Email : <?= $infoUser ["email"]?></p>
 

</body>
</html>