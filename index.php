<?php
$password= "monPassWord120928";
$password2 ="monPassWord120928";


/**
 * La fonction hash() est une fonction native dans certains langages de programmation
 *  (comme PHP) qui permet de calculer le hachage d'une chaîne de caractères ou d'un contenu donné.
 * (ou signature) unique d'une donnée. Il est généré à l'aide d'un algorithme spécifique, 
 * comme SHA-256, MD5, etc. Cela sert souvent à 
 */

// algo dd hashage faible ;
// les 2 algos dite faible ne faut pas les utiliser pour 
//hasher les mot de passe ni pour le register , nie pour le login 
// on peux l'utilser pour l'entification qui demande pas un grand niveua de sicurité
// génerer un QRcode par exemple.

$md5 = hash('md5',$password);
$md5_2 = hash('md5',$password2);

echo $md5 . '<br>';
echo $md5_2.'<br>';

$sha256 = hash('sha256',$password);
$sha256_2 = hash('sha256',$password2);

echo $sha256_2 .'<br>';
echo $sha256.'<br>';
// algo de hashage fort;(bycrip)

$hash = password_hash($password,PASSWORD_DEFAULT);

echo $hash . '<br>';
$hash_2 = password_hash($password2,PASSWORD_DEFAULT);
echo $hash_2 .'<br>';

// saisie dans le formulaire de login

$saisie = "monPassWord120928";

$sheck = password_verify($saisie,$hash);
echo $sheck ;
var_dump($sheck);