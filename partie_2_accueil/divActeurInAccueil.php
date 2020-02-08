<?php

require_once('../controller/controleur.php');

//Utilisation d'une function pour couper à un endroit précis, selectionné plus tard à l'appel de la fonction, au niveau d'un espace pour ne pas couper en plein millieu d'un mot
function tronquer($content,$maxCarac)
{
    $positionSpace = strpos($content, ' ',$maxCarac);
    $newContent = substr($content,0,$positionSpace);
    $newContent .= '...';
    return $newContent;
}

$req = $actorObj->getActorGeneral();
    while($donnees = $req->fetch())
    {
        ?>
        <div class="partieActeur<?php echo $donnees['name_actor']?> partieActeurDiv">
            <div class='partieGaucheLogo'>
                <img src="../public/logo/<?php echo $donnees['name_actor']?>.png" alt="logo de l'entité de <?php echo $donnees['name_actor']?>">
            </div>
            <div class='partieDroitePres'>
                <h3><?php echo $donnees['name_actor']?></h3>
                <a href='Demander lien au mentor'></a><!--Demander lien au mentor-->
                <p><?php echo tronquer($donnees['presentation_actor'],120);?></p>
                <a href="../partie_3_actor/acteur.php?acteur=<?php echo htmlspecialchars($donnees['id_actor']);?>&user=<?php echo htmlspecialchars($idUser);?>&page=2" class='lienActeur'>Lire la suite</a>
            </div>
        </div>
    <?php
}?>

