<?php

require_once('../controller/controleur.php');


$userName = $_POST['userNameConnexion'];
$passwordUser = $_POST['passwordConnexion'];

$req = $userObj->getuser($userName);
$resp = $req->fetch();
//Vérification du bon userName et bon password pour accepter la connexion
if($resp['userName'] == $userName && password_verify($passwordUser,$resp['userPassword']))
{
    session_start();
    $_SESSION['lastName'] = $resp['lastName'];
    $_SESSION['firstName'] = $resp['firstName'];
    $_SESSION['userName'] = $userName;
    $req = $userObj->getIdUser($userName);
    $donnees = $req->fetch();
    $userDonnees = $donnees['id_user'];
    header("Location:../partie_2_accueil/accueil.php?user=$userDonnees&page=1");
}   
else
{
    header('Location:pageInscriptionConnexion.php?errConnexion=1');
    
};
?>