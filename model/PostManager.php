<?php

require_once('model/Manager.php');

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'le %d/m/Y à %Hh%imin%ss\') AS creation_date_fr FROM billets LIMIT 0, 5');
        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id,titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/Y à %Hh%imin%ss\') AS creation_date_fr FROM billets WHERE id = ?');
        $req->execute(array($PostId));
        $post = $req->fetch();

        return $post;
    }
}
?>