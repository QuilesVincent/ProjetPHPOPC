<?php
require_once('../controller/controleur.php');
$idActor = $_GET['acteur'];
$idUser = $_GET['user'];
$page = $_GET['page'];
$pageSafe = htmlspecialchars($page);

?>


<!DOCTYPE html>
    <html lang="fr">
        <head>
            <title>Acteur</title>
            <meta charset='utf-8'>
            <link href='../public/css/headerAccueil&Acteur.css' rel='stylesheet'>
            <link href='../public/css/acteur.css' rel='stylesheet'>
            <link href="../public/css/footerGeneral.css" rel="stylesheet">
            <!--Ajouter des polices google pour rendre le tout plus jolie-->
            
        </head>

        <body>
        <!--Insertion de l'Header-->
            <?php include('../multiPage/headerAccueil&Acteur.php'); ?>
            
            <hr />
            <a href='../partie_2_accueil/accueil.php?user=<?php echo htmlspecialchars($idUser);?>&page=1' class='returnAccueilLien'>Retour à la page accueil</a>
            <!--Insertion de l'acteur, logo + description-->
            <section class='sectionActeur'>
                <?php include('insertionActorPageActor.php');?>
            </section>
            <hr />
            <!--Insertion de la partie commentaire + like de l'acteur-->
            <section class='sectionCommentaire'>
                <header class='commentHeader'>
                    <div class='titleHeaderComment'>
                        <h1>Commentaire</h1>
                    </div>
                    <div class='buttonLien'>
                        <div class='lienNewCom'>
                            <div class='aLienNewCom'>
                                <a href='newCom.php?acteur=<?php echo htmlspecialchars($idActor);?>&user=<?php echo htmlspecialchars($idUser);?>&page=<?= $pageSafe;?>'>Nouveau Commentaire</a>
                            </div>
                        </div>
                        <div class='divFormPostLike'>
                            <form action='LikePost.php?acteur=<?php echo htmlspecialchars($idActor);?>&user=<?php echo htmlspecialchars($idUser);?>&page=<?= $pageSafe;?>' method='post' class='formPostLike'>
                                <button type='submit' name='like+' class='submitLikePost submitGoodLike'>+++<?php include('returnlikeActor.php');?></button>
                                <button type='submit' name='like-' class='submitLikePost submitBadLike'>---<!-- Rajouter le petit logo html--></button>
                            </form>
                        </div>
                    </div>
                </header>
                <div class='divSectionComment'>
                    <?php include('commentInsertion.php') ?>
                </div>
            </section>
            <hr />
            <?php include('../multiPage/footerGeneral.php');?>

        </body>
    </html>
