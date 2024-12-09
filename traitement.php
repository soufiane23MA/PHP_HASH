<?php
if(isset($_GET["action"])){
switch ($_GET["action"]){
	case "register":
			//se connecter à la base de donnée, qu'on créra en avance)
			//dsn, username et le password.
		$pdo = new PDO("mysql:host=localhost;dbname=php_hash;charset=utf8","root","");
			// filtrer la data utilisateur récuperées dans les  champs inputs.
		$pseudo =filter_input(INPUT_POST,"pseudo",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$email =filter_input(INPUT_POST,"email",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$pass1 =filter_input(INPUT_POST,"pass1",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$pass2 =filter_input(INPUT_POST,"pass2",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		
if($pseudo && $email && $pass1 && $pass2){
		//var_dump($email);die;
		// aprés virification que les filter marchent, 
		$requete = $pdo->prepare("SELECT * FROM user WHERE email = :email");
		$requete ->execute(["email"=>$email]);
		$user = $requete->fetch();
		//si l'utilisateur existe dans notre base de donées		
		if($user){
			//echo "bonjour user";
			header("location:register.php"); exit;
		} else {
			//var_dump("utilisateur non existant");
			//echo " cet email , n existe pas";
		
		//ça marche
		// là maintenat je verifie si les 2 mots de passe 
		// sont identique , et
		if($pass1 == $pass2 && strlen($pass1) >= 5){
		// on va inserer l'utilisateur dans la base de données,
		// avec une requête préparée
			$insertUser = $pdo ->prepare("INSERT INTO user (pseudo,email,password ) 
				VALUES (:pseudo,:email,:password)");
			$insertUser->execute([
				"pseudo"=>$pseudo,
				"email"=>$email,
				// attention le mot de passe doit être hasher: 
				//pour ne pas avoir une emprunt numerique en claire dans la base de donnée.
				"password"=> password_hash($pass1,PASSWORD_DEFAULT)
				]);
					header("location:login.php"); exit;
				}else{
					// message pour informer l'utilisateur que 
					//les 2 mots de passe ne sont pas identiques
				}
			}
			}else{
				//problème de saisi 
			}
	break;
		};
		
	}


	

	