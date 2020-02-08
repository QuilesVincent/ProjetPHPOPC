<?php

require_once('../controller/controleur.php');

$userName = $_POST['userName'];
$secretQuestion = $_POST['secretQuestion'];
$secretQuestionAnswer = $_POST['secretQuestionAnswer'];
$password = $_POST['password'];
//Vérification des données de l'utilisateur pur être sur qu'il existe, avant de faire les modifications
$req = $userObj->getUserResetPass($userName, $secretQuestion, $secretQuestionAnswer);
$donnees = $req->fetch();
if(empty($donnees))
{
    header("Location:newPassword.php?page=0&errP=o");
}
else
{
    $reqPass = $userObj->modificationUserPassword($userName,$secretQuestionAnswer, $password);
    header('Location:pageInscriptionConnexion.php?page=0');
    
}

?>
