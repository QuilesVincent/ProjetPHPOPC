<?php

require_once '../controller/controleur.php';


?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <title>Inscription/connexion</title>
            <meta charset='utf-8'>
            <link href='../public/css/connexionInscription.css' rel='stylesheet'>
            <link href="../public/css/footerGeneral.css" rel="stylesheet">
            <!--Ajouter des polices google pour rendre le tout plus jolie-->
            
        </head>

        <body>
            <header>
                <div class='titleName'>
                    <h1>GBAF</h1>
                </div>
                <!--Affichage du formulaire de connexion -->
                <div class='connexionFormContent'>
                    <?php include('formPageConnexion.php');?>
                </div>
            </header>
            <section class='inscriptionSection'>
                <div class='partieEsthetique'>
                    <div class='partieEsthetiqueContent'>
                        <h2>Une solution pour trouver le service qui vous correspond</h2>
                        <p>Pour gagner vraiment de l'argent, il faut effectuer les recherches et trouver
                            les bon placements. Pour conserver toutes la feignantise de vos clients, voici un un site vous permettant
                            d'effectuer le travail à leur place
                        </p>
                    </div>  
                </div>
                <!--Affichage du formulaire d'inscription -->
                <div class='informationInscription'>
                    <div class='titleInscription'>
                        <h2>Inscription</h2>
                        <p>Le monde de la finance s'ouvre bientôt à vous</p>
                    </div>
                    <form action='inscriptionFormPost.php' method='post' class='inscriptionFormContent'>
                        <?= empty($_GET['mdic']) ? false : writteAlert($errorObj->missDonnee(), 'p');?>
                        <div class='firstLastNameContent'>
                            <input type='text' name='firstNameInscription' placeholder="Prénom">
                            <input type='text' name='lastNameInscription' placeholder="Nom">
                        </div>
                        <div class='userNameInscriptionContent'>
                            <?= empty($_GET['unf']) ? false : writteAlert($errorObj->userNameNoFree(), 'p'); ?>
                                <input type='text' name='userNameInscription' placeholder='UserName' class='userNameInscription'>

                        </div>
                        <input type='password' name='passwordInscription' placeholder="Mot de passe" class='passwordInscription'>
                        <select class='secretQuestion' name='secretQuestion'>
                            <option value='1'>Quelle est le nom de jeune fille de votre mère ?</option>
                            <option value='2'>Quel est le prénom de votre animal de compagnie ?</option>
                            <option value='3'>Quel est le nom de votre hacker préféré ?</option>
                            <option value='4'>Quel est le nom de votre entrepreneur préféré</option>
                        </select>
                        <div class="answerSecretQuestionContent">
                            <input type='text' name='answerSecretQuestion' class='answerSecretQuestion' placeholder="Réponse à la question selectionné au dessus">
                        </div>
                        <button type='submit' name='submitInscription' class='submitInscription'>Inscription</button>

                    </form>
                </div>
            </section>
        <?php include('../multiPage/footerGeneral.php');?>
        </body>
    </html>