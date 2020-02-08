<?php
require_once('DBManager.php');
require_once('../controller/controleur.php');

class LikeManager extends DBManager
{
    //function pour nous fournir le nombre de like par actor (à l'aide d'une variable indexé à 0 et incrémenté à chaque like dans le fichier page affichant les likes)
    public function getNumberLikeActor($idActor)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT like_number FROM likeactor WHERE id_targetActorLike = ?');
        $req->execute(array($idActor));
        return $req;
    }
    //Fonction pour savoir qui à liké un acteur (doit-on la fournir ? demandé à phillipe)
    //On recupère d'abord tous les id_targetUserLike qui ont aimé l'acteur selectionné
    //Puis on récupère les nom et prénom de chacun d'eux (ou username au choix) pour savoir qui a aimé
    public function getWhoLike($idActor)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id_targetUserLike FROM likeactor WHERE id_targetActorLike= ?');
        $req->execute(array($idActor));
        $donnees = $req->fetch();
        if(isset($donnees))
        {
            $req->closeCursor();
            $req = $db->prepare('SELECT lastName,firstName FROM user WHERE id_user = ?');
            $req->execute(array($donnees['id_targetUserLike']));
            return $req;
        }
    }
    //Fonction pour mettre un like
    //On vérifie d'abord que l'actor ne possède pas un like de l'idUser de l'user connecté
    //Puis on post si aucun like trouvé
    public function postLike($idActor,$idUser)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM likeactor WHERE id_targetActorLike = ? AND id_targetUserLike = ?');
        $req->execute(array($idActor, $idUser));
        $donnees = $req->fetch();
        if(empty($donnees))
        {
            $req->closeCursor(); //pas sur pour ça, faut il arrêter avant le if ? jamais ?
            $req = $db->prepare('INSERT INTO likeactor(id_targetActorLike, id_targetUserLike, like_number) VALUES(:id_targetActorLike, :id_targetUserLike, :like_number)');
            $req->bindValue(':id_targetActorLike', $idActor, PDO::PARAM_INT);
            $req->bindValue(':id_targetUserLike', $idUser, PDO::PARAM_INT);
            $req->bindValue(':like_number', 1, PDO::PARAM_INT);
            $affectedLines = $req->execute();
            return $affectedLines;
        }
    }
    //Fonction pour supprimer un like
    //On vérifie d'abord que l'actor possède un like de l'idUser de l'user connecté
    //Puis on supprime le like de l'user connecté si un like a bien été trouvé
    public function deleteLike($idActor, $idUser)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM likeactor WHERE id_targetActorLike = ? AND id_targetUserLike = ?');
        $req->execute(array($idActor, $idUser));
        $donnees = $req->fetch();
        if(isset($donnees))
        {
            $req->closeCursor();
            $req = $db->prepare('DELETE FROM likeactor WHERE id_targetActorLike = ? AND id_targetUserLike = ?');
            $affectedLines = $req->execute(array($idActor,$idUser));
            
        }
    }
}

?>