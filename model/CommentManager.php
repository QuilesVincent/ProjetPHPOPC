<?php

require_once('DBManager.php');
require_once('../controller/controleur.php');

class CommentManager extends DBManager
{
    //Fonction pour selectionner les commentaires par actor
    public function getComment($actorId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT comment_content, comment_date FROM comments WHERE id_targetActor = ?');
        $req->execute(array($actorId));
        return $req;
    }
    //Fonction pour publier un post (vérifie avant de poster les commentaires, que l'user n'a pas déjà poster un commentaire sur l'acteur selectionné
    public function postComment($actorId, $userId, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE id_targetUser = ? AND id_targetActor = ?');
        $req->execute(array($userId, $actorId));
        $donnees = $req->fetch();
        if(empty($donnees))
        {
            $req->closeCursor();
            $req = $db->prepare('INSERT INTO comments (id_targetActor, id_targetUser, comment_content, comment_date) VALUES (:id_targetActor, :id_targetUser, :content, NOW())');
            $req->bindValue(':id_targetActor', $actorId, PDO::PARAM_INT);
            $req->bindValue(':id_targetUser', $userId, PDO::PARAM_INT);
            $req->bindValue(':content',$content, PDO::PARAM_STR);
            $affectedLines = $req->execute();
            return $affectedLines;
        }
    }
    //Fonction pour modifier un commentaire (demander avant à philippe si nécessaire)
    public function modificationComment($actorId, $userId, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment_content = :comment_content WHERE actorId = :actorId AND id_targetUser = :id_targetUser');
        $donnees = $req->execute(array(
            ':comment_content' => $content,
            ':actorId' => $actorId,
            ':id_targetUser' => $userId,
        ));
    }
}

?>