<?php

class ErrorManager
{
    protected $msgDonneManquante = "il faut obligatoirement rentré des données";

    public function missDonnee()
    {
        return $this->msgDonneManquante. ' pour toutes les informations demandées';
    }

    public function missName()
    {
        return "Prénom vide, " .$this->msgDonneManquante;
    }
    public function missLastName()
    {
        return "Nom de famille vide, " .$this->msgDonneManquante;
    }
    public function missPassword()
    {
        return "Mot de passe vide " .$this->msgDonneManquante ;
    }
    public function missUserName()
    {
        return "UserName vide, " .$this->msgDonneManquante;
    }
    public function missAnswerQuestion()
    {
        return "la réponse à la question est vide, " .$this->msgDonneManquante;
    }

    public function userNameNoFree()
    {
        return "L'username demandé n'est pas disponible";
    }

    /**
     * @return string
     */
    public function comentAlreadyPost()
    {
        return "Vous avez déjà posté un commentaire";
    }
    public function pagePasswordErr()
    {
        return "Erreur dans l'userName, la question selectionnée ou la réponse";
    }

}
