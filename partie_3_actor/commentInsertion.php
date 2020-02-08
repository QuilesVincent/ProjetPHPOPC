<?php

require_once('../controller/controleur.php');

//Accès à l'Username en fonction de l'id user du commentaire
$req = $userObj->getUserUserName($idUser);
if($donnees = $req->fetch())
{
    $userNameComment = $donnees['userName'];
};
$req->closeCursor();

//affichage des différents commentaires
$comment = $actorComment->getComment($idActor);
    while($donnees = $comment->fetch())
    {
    ?>
        <div class='comment'>
            <div class='infoUserComment'>
                <p><?php echo $userNameComment;?></p> <!-- On se sert bien du nom de l'objet User pour mettre le nom à jour en cas de changement dans param compte -->
                <p><?php echo htmlspecialchars($donnees['comment_date']);?></p>
                </div>
                <div class='contentComment'>
                <p><?php echo htmlspecialchars($donnees['comment_content']);?></p>
            </div>
        </div>
    <?php

    }

?>