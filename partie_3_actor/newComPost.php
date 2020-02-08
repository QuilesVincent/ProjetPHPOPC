<?php
session_start();
require_once('../controller/controleur.php');
$idActor = $_GET['acteur'];
$idUser = $_GET['user'];
$content = $_POST['contentCom'];
$page = $_GET['page'];

$req = $userObj->getUserUserName($idUser);
$donnees = $req->fetch();
//Appel de la fonction pour poster les commentaires.On vérifiera dans cette fonction que l'user n'a pas déjà posté un commentaire sur cet acteur
//Ceci avant d'effectuer le post.
$affectedLines = $actorComment->postComment($idActor,$idUser, $content);
if(empty($affectedLines)){
    header("Location:newCom.php?acteur=$idActor&user=$idUser&page=$page&com=n");

} else {
    header("Location:acteur.php?acteur=$idActor&user=$idUser&page=$page");
}




?>