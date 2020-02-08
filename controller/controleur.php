<?php

require_once('../model/CommentManager.php');
require_once('../model/ActorManager.php');
require_once('../model/UserManager.php');
require_once('../model/LikeManager.php');
require_once('../model/ErrorManager.php');

$actorObj = new ActorManager;
/* Question à poser à philippe Beck
    D'un point de vue présentation ; le meilleur est-il de :
        -ecrire l'appel des fonction ici et se servir de donnees juste d'en le fichier d'affichage (ici insertionActorPageActor.php)
        -ecrire l'appel des fonction comme je l'ai fais dans le fichier d'affichage
        -ou créer une autre fichier qui fera la liaison entre le controleur et le fichier d'affichage en réalisant l'appel des fonction
$req = $actorObj->getActorSelect($idActor);
$donnees = $req->fetch();
*/

$actorComment = new CommentManager;

$likeObj = new LikeManager;

$userObj = new UserManager;

$errorObj = new ErrorManager;

function writteAlert($obj, $balise)
{
    return "<$balise class='msgAdvertissementMiss'>".$obj."</$balise>";
}


?>