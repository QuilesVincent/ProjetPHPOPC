<?php

require_once('model/Manager.php');

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/ùm/ùY à %Hh%imin%ss\') AS date_com FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
        $comment->execute(array($postId));
    
        return $comment;
    }

    public function postComment($postId, $author, $commente)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES(:id_billet, :auteur, :commentaire, NOW())');
        $comment->bindValue(':id_billet',$postId, PDO::PARAM_INT);
        $comment->bindValue(':auteur', $author, PDO::PARAM_STR);
        $comment->bindValue(':commentaire', $commente, PDO::PARAM_STR);
        $affectedLines = $comment->execute();
        return $affectedLines;
    }

    public function changeComment($id, $content)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE commentaires set commentaire = ? WHERE id = ?');
        $donnees = $comment->execute(array($content, $id));
    }
}
?>