<?php

require_once('../controller/controleur.php');

//Ajoute de +1 à la variable numberlike à chaque fois que la variable donnees n'est pas vide
//Puis on affiche la variable numberLike qui représente le nombre de like trouvé
$numberLike = 0;
$req = $likeObj->getNumberLikeActor($idActor);
while($donnees = $req->fetch())
{
    $numberLike += 1;
}
echo $numberLike;

?>