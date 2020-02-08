<?php

$page = $_GET['page'];

if($page === 'inscription/connexion'){
    require '../partie_1_inscription_connexion/pageInscriptionConnexion.php';
}else if ($page === 'accueil'){
    require '../partie_2_accueil/accueil.php';
}else if ($page === 'acteur'){
    require '../partie_3_actor/acteur.php';
}else if ($page === 'inscriptionPost'){
    require '../partie_1_inscription_connexion/inscriptionFormPost.php';
}else if ($page === 'connexionPost') {
    require '../partie_1_inscription_connexion/connexionFormPost.php';
}