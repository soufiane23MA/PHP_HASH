<h1> Projet d'Authentification PHP avec Sessions</h1>
   Ce projet implémente un système d'inscription, de connexion, de gestion de session et de profil utilisateur en PHP.<br>
   Il permet aux utilisateurs de s'inscrire, de se connecter, de consulter leur profil, et de se déconnecter.
   Dans ce projet j'ai géré les fonctionnalité suivantes:<br>
<h2>Fonctionnalités</h2><br>
  1- L'nscription : Les utilisateurs peuvent s'inscrire en fournissant un pseudo, un email, et un mot de passe. Le mot de passe est haché avant d'être stocké dans la base de données.
  2- La LConnexion : Les utilisateurs peuvent se connecter en utilisant leur email et leur mot de passe. La vérification du mot de passe se fait via password_verify().
  3- Le Profil utilisateur : Les utilisateurs connectés peuvent consulter leur profil, qui affiche leur pseudo et email.
  4- La Déconnexion : Les utilisateurs peuvent se déconnecter en supprimant leur session active.<br>
<h2> Structure du projet</h2><br>
  1- traitement.php : Contient la logique de traitement des actions (inscription, connexion, déconnexion, profil).<br>
  2- register.php : Formulaire d'inscription.<br>
  3- login.php : Formulaire de connexion.<br>
  4 -profile.php : Affichage du profil utilisateur.<br>
  5- home.php : Page d'accueil avec les liens de connexion, d'inscription et de déconnexion.<br>
  6- index.php: dans ce fichier, j'ai pu exercer la notion de Hachage du mot de passe.<br>
<h2>Améliorations possibles</h2>:
  1- Ajouter une fonctionnalité de réinitialisation de mot de passe.
  2- Implémenter un système de validation de l'email (envoi d'un email de confirmation).
  3- Ajouter une gestion des rôles utilisateurs (administrateur, utilisateur).

<h2>🎯 Objectifs pédagogiques</h2>
  L'objectif principale de ce projet est me familiariser avec les principale fonctionnalités de sécurisation de la base des données<br>
  en cas de soumission des données des utilisateurs. via les formulaires ( inscription, connection).
 
<h2>📝 Consignes</h2>
   Les consignes clés que j'ai utilisé dans ce projet sont:
  <h3>1 - Gestion des Sessions en PHP</h3>
   =>  Session Start : La fonction session_start() est utilisée pour démarrer une session PHP, permettant de stocker et récupérer des données spécifiques à un utilisateur pendant sa   
     navigation sur le site. Cela permet de garder une trace de l'utilisateur connecté.<br>
   => $_SESSION : Ce superglobal est utilisé pour stocker des informations sur l'utilisateur, comme son pseudo ou son email, après une connexion réussie.<br> 
      Ces données restent accessibles tant que la session est active.<br>
 <h3>2- Filtrage et Validation des Données Utilisateur</h3>
   => filter_input() : Cette fonction est utilisée pour valider et nettoyer les données envoyées par l'utilisateur (comme l'email, le pseudo, ou le mot de passe). <br>
      Elle permet deprévenir les attaques par injection SQL ou XSS en s'assurant que les données sont sûres avant de les utiliser.<br>
    => Filtrage des Emails et des Pseudo : Vous utilisez des filtres comme FILTER_SANITIZE_EMAIL et FILTER_SANITIZE_FULL_SPECIAL_CHARS pour nettoyer les données utilisateur avant de les        stocker dans la base de données ou de les afficher.<br>
 <h3>3- Hachage des Mots de Passe </h3>
   => password_hash() : Cette fonction permet de sécuriser le mot de passe en le hachant avant de le stocker dans la base de données. Le mot de passe n'est jamais stocké en clair, ce qui       renforce la sécurité du site.<br>
   => password_verify() : Lors de la connexion, cette fonction compare le mot de passe soumis par l'utilisateur avec le mot de passe haché stocké dans la base de données. Elle permet de       vérifier si les mots de passe correspondent sans jamais avoir besoin de stocker ou de manipuler le mot de passe en clair.<br>
 <h3>4- Requêtes Préparées et Sécurisation SQL</h3>
   => PDO (PHP Data Objects) : J'ai utilisé le PDO pour interagir avec la base de données. Cela permet de se connecter à la base de données de manière sécurisée, en utilisant des  
   => Requêtes préparées pour éviter les attaques par injection SQL en séparant le code SQL des données utilisateu.<br>
 <h3>5- Redirections et Gestion des Flux</h3>
   => Redirection après actions : Après l'inscription, la connexion ou la déconnexion, j'utilise header("Location: ...") pour rediriger l'utilisateur vers la page appropriée (comme 
     la page d'accueil, la page de profil, ou la page de connexion). <br> Cela permet de contrôler le flux de l'application et d'éviter les accès non autorisés.<br>
   => Vérification de la session : Avant d'afficher certaines pages (comme le profil), je vérifie si l'utilisateur est connecté en testant si $_SESSION["user"] est définie. Cela 
     empêche l'accès à ces pages sans être connecté.<br>
     <h3>6- Base de Données</h3>
   j'ai créé une table user pour stocker les informations des utilisateurs (pseudo, email, mot de passe). Chaque utilisateur a un identifiant unique (clé primaire id).
   je vérifie par la suite l'existence de l'utilisateur : Lors de l'inscription, je vérifie si l'email existe déjà dans la base de données. Cela empêche les utilisateurs de s'inscrire 
   avec un email déjà utilisé.<br>
<h3>7- Gestion des Erreurs</h3>
   => Messages d'erreur et redirection : Si un problème survient lors de l'inscription ou de la connexion (par exemple, des mots de passe non identiques ou un email déjà utilisé),je    
   redirige l'utilisateur vers la page correspondante (inscription ou connexion) pour corriger l'erreur et retenter l'action qui voulé faire.
<h3>8- Structure de l'Application</h3>
  Modularité : Votre application est structurée en plusieurs fichiers PHP distincts pour gérer les différentes actions (inscription, connexion, déconnexion, profil). Cela rend le code 
  plus lisible et facile à maintenir.
  Formulaires HTML : Vous utilisez des formulaires HTML pour permettre à l'utilisateur de soumettre ses informations (pseudo, email, mot de passe) pour l'inscription et la connexion.
<h3>9- Sécurisation des Formulaires</h3>
Validation des mots de passe : Vous comparez les mots de passe (pass1 et pass2) pour vous assurer qu'ils sont identiques avant de les enregistrer. Vous imposez également une longueur minimale pour le mot de passe, ce qui renforce la sécurité.
10. Déconnexion et Sécurisation de la Session
unset() : Lors de la déconnexion, vous utilisez unset($_SESSION["user"]) pour supprimer les données de session de l'utilisateur et ainsi mettre fin à sa session active.
    
      
 

<h2>🔧 Technologies utilisées</h2>
 
<h2>💡 Concepts clés abordés</h2>
 
<h2>📦 Installation</h2>
 
<h2>✨ Démonstration</h2>
 

<h2>📚 Ressources</h2>
 
