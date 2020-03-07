<?php

require_once('DBManager.php');
require_once('../controller/controleur.php');

class DislikeManager extends DBManager
{
    //function pour nous fournir le nombre de dislike par actor (à l'aide d'une variable indexé à 0 et incrémenté à chaque like dans le fichier page affichant les likes)
    public function getNumberDisLikeActor($idActor)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT dislike_number FROM dislikeactor WHERE id_targetActorDislike = ?');
        $req->execute(array($idActor));
        return $req;
    }
    //Fonction pour savoir qui à disliké un acteur (doit-on la fournir ? demandé à phillipe)
    //On recupère d'abord tous les id_targetUserLike qui ont dislike l'acteur selectionné
    //Puis on récupère les nom et prénom de chacun d'eux (ou username au choix) pour savoir qui a dislike
    public function getWhoDislike($idActor)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id_targetUserDislike FROM dislikeactor WHERE id_targetActorDislike= ?');
        $req->execute(array($idActor));
        $donnees = $req->fetch();
        if(isset($donnees))
        {
            $req->closeCursor();
            $req = $db->prepare('SELECT lastName,firstName FROM user WHERE id_user = ?');
            $req->execute(array($donnees['id_targetUserDislike']));
            return $req;
        }
    }
    //Fonction pour mettre un like
    //On vérifie d'abord que l'actor ne possède pas un disLike de l'idUser de l'user connecté
    //Puis on post si aucun dislike trouvé
    public function postDislike($idActor,$idUser)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM dislikeactor WHERE id_targetActorDislike = ? AND id_targetUserDislike = ?');
        $req->execute(array($idActor, $idUser));
        $donnees = $req->fetch();
        if(empty($donnees))
        {
            $req->closeCursor(); //pas sur pour ça, faut il arrêter avant le if ? jamais ?
            $req = $db->prepare('INSERT INTO dislikeactor(id_targetActorDislike, id_targetUserdisLike, dislike_number) VALUES(:id_targetActorDislike, :id_targetUserdisLike, :dislike_number)');
            $req->bindValue(':id_targetActorDislike', $idActor, PDO::PARAM_INT);
            $req->bindValue(':id_targetUserdisLike', $idUser, PDO::PARAM_INT);
            $req->bindValue(':dislike_number', 1, PDO::PARAM_INT);
            $affectedLines = $req->execute();
            return $affectedLines;
        } else
        {
            return false;
        }
    }
    //Fonction pour supprimer un dislike
    //On vérifie d'abord que l'actor possède un dislike de l'idUser de l'user connecté
    //Puis on supprime le dislike de l'user connecté si un dislike a bien été trouvé
    public function deleteDisLike($idActor, $idUser)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM dislikeactor WHERE id_targetActorDislike = ? AND id_targetUserDislike = ?');
        $req->execute(array($idActor, $idUser));
        $donnees = $req->fetch();
        if(isset($donnees))
        {
            $req->closeCursor();
            $req = $db->prepare('DELETE FROM dislikeactor WHERE id_targetActorDislike = ? AND id_targetUserDislike = ?');
            $affectedLines = $req->execute(array($idActor,$idUser));
            return $affectedLines;
        }else
        {
            return false;
        }
    }
}