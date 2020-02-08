<?php
require_once('../controller/controleur.php');

//Appel de la fonction d'affichage de l'actor
$req = $actorObj->getActorSelect($idActor);
$donnees = $req->fetch();
?>
    <div class='actorLogo'>
        <img src='../public/logo/<?php echo $donnees['name_actor'];?>.png' alt='Une photo du logo de <?php echo $donnees['name_actor'];?>'>
    </div>
    <div class='infoActeur'>
        <h2><?php echo $donnees['name_actor'];?></h2>
        <a href='demanderLienAuMentor'></a> <!--Demander lien au mentor-->
        <p><?php echo $donnees['presentation_actor'];?></p>
    </div>