<?php
session_start();
require_once('../controller/controleur.php');
$idActor = $_GET['acteur'];
$idUser = $_GET['user'];
$page = $_GET['page'];
//Selon que le post soit like+ ou like-, le résultat sera différent
if(isset($_POST['like+']))
{
    $affectedLines = $likeObj->postLike($idActor, $idUser);
}
else
{
    $affectedLines = $likeObj->deleteLike($idActor, $idUser);
}

header("Location:acteur.php?acteur=$idActor&user=$idUser&page=$page");

?>