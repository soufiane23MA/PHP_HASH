<?php

session_start();

if(isset($_GET["action"])){
	switch ($_GET["action"]){
		case "register":
			//se connecter à la base de donnée, qu'on créra en avance)
			//dsn, username et le password.
			// si l'utilisateur a soumis son formulaire 
			if( isset ($_POST["submit"])){
				$pdo = new PDO("mysql:host=localhost;dbname=php_hash;charset=utf8","root","");
				// filtrer la data utilisateur récuperées dans les  champs inputs.
				$pseudo =filter_input(INPUT_POST,"pseudo",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$email =filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL);
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
					}else {
						//var_dump("utilisateur non existant");
						//echo " cet email , n existe pas";
						//ça marche
						// là maintenat je verifie si les 2 mots de passe 
						// sont identique , et
						if($pass1 == $pass2 && strlen($pass1) >= 5){
							// on va inserer l'utilisateur dans la base de données,
							// avec une requête préparée
							$insertUser = $pdo ->prepare("INSERT INTO user (pseudo,email,password) 
							VALUES (:pseudo,:email,:password)");
							$insertUser->execute([
								"pseudo"=>$pseudo,
								"email"=>$email,
								// attention le mot de passe doit être hasher: 
								//pour ne pas avoir une emprunt numerique en claire dans la base de donnée.
								"password"=> password_hash($pass1,PASSWORD_DEFAULT)]);
								header("location:login.php"); exit;
							}else{
								// message pour informer l'utilisateur que 
								//les 2 mots de passe ne sont pas identiques
								}
					}
				}else{
					//problème de saisi 
					}
					header("location:register.php");exit;
					// je redirige l'utilisateur vers le formulaire pour s'enregister
			}
		break;
		case "login":
			if( isset ($_POST["submit"])){
				//on se concécte à la base de données
				$pdo = new PDO("mysql:host=localhost;dbname=php_hash;charset=utf8","root","");
				//on filtre les data utilisateur soumise dans le formulaire
				$email =filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL,FILTER_VALIDATE_EMAIL);
				$password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				//si on a éffectivement une adresse mail et un mot de passe
				//on prépare une requête pour récuperer la data utilisateur de la base de données
				//pour la comparer a celle qui viens de soumis.
				//vérification de l'empreinte numérique via password_verify() qui returne false or true
				if($email && $password){
					//var_dump("ok");die;
					$requete = $pdo->prepare("SELECT * FROM user WHERE email=:email");
					$requete ->execute(["email"=> $email]);
					$user = $requete->fetch();
					// récupere le resultat de la requête et la stockée dans la variable user
					//on verifie les données récuperer 
					if($user){
						//var_dump($user);die;
						$hash = $user["password"];
						//on compare le passeword soumis et celui enregistrer dans notre BD
						if(password_verify($password,$hash)){
							$_SESSION["user"] = $user;// rediriger le user vers la page d'accueil
							header("location: home.php");exit;
						}else{//si on a pas réussi a ouvrire la session, on le redirige vers la page de login pour résseiller
								header("location:login.php");exit;
								//echo"identifiant non enregistrer
								}
					}
				}	
			} 
		header("location:login.php");
			break;
		
		case "profile" :
			header("location :profile.php");
			break ;
			
			case "logout":
				unset($_SESSION["user"]);
				header("location : home.php");
				
				break; 
			
	}
};


