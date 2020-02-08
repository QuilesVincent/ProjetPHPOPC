<?php

require('../controller/controleur.php');
$idActor = $_GET['acteur'];
$idUser = $_GET['user'];
$page = $_GET['page'];
$pageSafe = htmlspecialchars($page);
?>


<!DOCTYPE html>
    <html>
        <head>
            <title>Comment Actor</title>
            <meta charset='utf-8'>
            <link href='../public/css/headerAccueil&Acteur.css' rel='stylesheet'>
            <link href='../public/css/newCom.css' rel='stylesheet'><!--Faire fichier css-->
            <link href="../public/css/footerGeneral.css" rel="stylesheet">
            <!--Ajouter des polices google pour rendre le tout plus jolie-->
            
        </head>

        <body>
        <!--Insertion de la partie header-->
            <?php include('../multiPage/headerAccueil&Acteur.php'); ?>
            <hr />
        <!--Insertion du formulaire pour écrire le commentaire-->
            <div class="divForm">
                <?php echo isset($_GET['com']) ? "<h1>".$errorObj->comentAlreadyPost()."</h1>" : "<h1> Ecrivez le commentaire voulu </h1>" ;?>
                <form action='newComPost.php?acteur=<?php echo htmlspecialchars($idActor);?>&user=<?php echo htmlspecialchars($idUser);?>&page=<?= $pageSafe;?>' method='post'>
                    <div class="divContentComment">
                        <textarea name='contentCom'></textarea>
                    </div>
                    <div class="divSubmit">
                        <button type='submit' name='submitCom' class='submitCom'>Valider</button>
                        <a href="acteur.php?acteur=<?php echo htmlspecialchars($idActor). "&user=".htmlspecialchars($idUser). "&page=" .$pageSafe?>">Annuler</a>
                    </div>

                </form>
            </div>
        <?php include('../multiPage/footerGeneral.php');?>
        </body>
    </html>