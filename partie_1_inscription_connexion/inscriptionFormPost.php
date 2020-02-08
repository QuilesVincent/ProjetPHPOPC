<?php
require_once('../controller/controleur.php');

$firstName = $_POST['firstNameInscription'];
$lastName = $_POST['lastNameInscription'];
$userName = $_POST['userNameInscription'];
$password = $_POST['passwordInscription'];
$secretQuestion = $_POST['secretQuestion'];
$answserSecretQuestion = $_POST['answerSecretQuestion'];


if (empty($firstName) || empty($lastName) || empty($userName) || empty($password) || empty($answserSecretQuestion)) {
    $missDonnee = 'mdic=o';
    /* SI je veux conserver un get pour chaque type de donnée, mais normalement, je ne devrais pas les garder car utilisation d'un miss donnée générale
    if(empty($firstName)){
        $missFirstName = '&f=n';
    }
    if(empty($lastName)){
        $missLastName = '&l=n';
    }
    if(empty($userName)){
        $missUserName = '&u=n';
    }
    if(empty($password)){
        $missPassword = '&p=n';
    }
    if(empty($answserSecretQuestion)){
        $missanswerSecretQuestion = '&a=n';
    }*/
    header("Location:pageInscriptionConnexion.php?page=0&$missDonnee");
} else {
    $verifUser = $userObj->getUser($userName);
    $donnees = $verifUser->fetch();
    if(empty($donnees))
    {
        $affectedLines = $userObj->addUser($firstName,$lastName, $userName,$password, $secretQuestion, $answserSecretQuestion);
        session_start();
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['userName'] = $userName;
        $req = $userObj->getIdUser($userName);
        $donnees = $req->fetch();
        $userDonnees = $donnees['id_user'];
        header("Location:../partie_2_accueil/accueil.php?user=$userDonnees&page=1");
    }
    else{
        header('Location:pageInscriptionConnexion.php?unf=o');
    }
}
//vérification de la présence d'un compte avec l'username avant la création du compte



?>