<?php

require_once('DBManager.php');
require_once('../controller/controleur.php');

class ActorManager extends DBManager
{
    //Function pour selectionner tous les actors
    public function getActorGeneral()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id_actor, name_actor, presentation_actor FROM acteurpartenaire');
        return $req;
    }
    //Function pour selectionner un actor on fonction d'un id
    public function getActorSelect($actorId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT name_actor, presentation_actor FROM acteurpartenaire WHERE id_actor = ?');
        $req->execute(array($actorId));
        return $req;
    }
    //fonction pour avoir le nombre de like de l'actor (pour l'instant indexé à 0 et non modifié, réfléchir donc à faire quelque chose ou
    //juste supprimer cette collonde et donc cette fonction
    public function getLike($actorId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT like_actor FROM acteurpartenaire WHERE id_actor = ?');
        $req->execute(array($actorId));
        return $req;
    }
    //Function pour ajouter un actor (pour l'instant pas de moyen d'en ajouter un, juste cette fonction (demander à philippe si on laisse ?)
    public function addActor($name, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO acteurpartenaire (name_actor,presentation_actor,like_actor) VALUES (:name_actor, :presentation_actor,:like_actor)');
        $req->bindValues(':name_actor', $name, PDO::PARAM_STR);
        $req->bindValues(':presentation_actor', $content, PDO::PARAM_STR);
        $req->bindValues(':like_actor', 0, PDO::PARAM_INT);
        $affectedLines = $req->execute();
        return $affectedLines;

    }
    //Fonction pour mettre a jour les like (cf function getLike comment)
    public function updateLike($like, $actorId)
    {
        $db = $this->dbConnect();
        //Pour la partie likeactually et likemodification, pas sur que ça marche, il faudrat trouver une autre solution si nécessaire
        $likeactually = $this->getLike($actorId);
        $likeModification = $likeactually + $like;
        $req = $db->prepare('UPDATE acteurpartenaire set like_actor = ? WHERE id_actor = ?');
        $req->execute(array($likeModification, $actorId));
    }
}

?>