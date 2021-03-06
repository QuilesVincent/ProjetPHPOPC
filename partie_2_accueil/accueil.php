<?php

require_once('../controller/controleur.php');
$idUser = $_GET['user'];

?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <title>Accueil</title>
            <meta charset='utf-8'>
            <link href='../public/css/headerAccueil&Acteur.css' rel='stylesheet'>
            <link href='../public/css/accueil.css' rel='stylesheet'>
            <link href="../public/css/footerGeneral.css" rel="stylesheet">
            <!--Ajouter des polices google pour rendre le tout plus jolie-->
            
        </head>

        <body>
            <?php include('../multiPage/headerAccueil&Acteur.php'); ?>
            <hr />

            <section class='sectionGBAF'>
                <div class='textGBAFPres'>
                    <h1>Le GBAF</h1>
                    <p>Le GBAF est donc une entité commerciale balablabalbalablabalbalblabalabalalbalablabalablablababablba balablabalbalablabalbalblabalabalalbalablabalablablababablba balablabalbalablabalbalblabalabalalbalablabalablablababablba
                        balablabalbalablabalbalblabalabalalbalablabalablablababablba balablabalbalablabalbalblabalabalalbalablabalablablababablba balablabalbalablabalbalblabalabalalbalablabalablablababablba
                    </p>
                </div>
                <div class='imageGBAFPresentationDiv'>
                    <img src='../public/logo/gbaf.png' alt='Une photo illustrant les bureau de la société GBAF' class='imgGBAFPres'>
                </div>
            </section>
            <hr />

            <section class='sectionActeurs'>
                <div class='partie1Acteur'>
                    <h2>Les acteurs partenaires</h2>
                    <p>Vous trouverez ci-dessous, un descriptif rapide des différentes entités commerciales partenaires. Pour plus d'informations sur chaque acteurs, cliquez
                        sur le lien présent en dessous du nom de l'entité voulu
                    </p>
                </div>
                <div class='partie2Acteur'>
                    <?php include('divActeurInAccueil.php');?>
                </div>
            </section>
            <hr />
            <?php include('../multiPage/footerGeneral.php');?>

        </body>
    </html>