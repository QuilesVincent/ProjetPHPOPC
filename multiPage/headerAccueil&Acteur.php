<?php
session_start();
$rootChangeParam ='';
$idUser = $_GET['user'];
$page = $_GET['page'];
$idUserSafe = htmlspecialchars($idUser);
$pageSafe = htmlspecialchars($page);

/*
Trouver un moyen de récupérer le get de l'actor
if($_SESSION['actor'] != null){
    $actorSafe = $_SESSION['actor'];
    $rootChangeParam = "&actor=$actorSafe";
} else {
    $rootChangePram = "";
}*/

?>
<header>
    <div class='containHeader'>
        <div class='logoHeader'>
            <img alt='Logo de la société GBAF' src='../public/logo/gbafMiniature.png'>
        </div>
        <div class='infoUser'>
            <p><?php echo htmlspecialchars($_SESSION['lastName']). ' & ' .htmlspecialchars($_SESSION['firstName']);?></p>
        </div>
    </div>
    <form action='../logOut/deconnexionPost.php' method='post' class='formDecoParam'>
        <a href='../multiPage/paramUser.php?user=<?= $idUserSafe;?>&page=<?=$pageSafe;?><?= $rootChangeParam;?>'>param du compte</a>
        <button type='submit' name='sessionDeco'>Deconnexion</button>
    </form>
    
</header>