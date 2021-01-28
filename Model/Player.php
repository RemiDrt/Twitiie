<?php

class Player {

    private $pseudo;
    private $mail;
    private $mdp;

    public function __construct($pseudo, $mail, $mdp){
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->mdp = $mdp;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function getMail(){
        return $this->mail;
    }

    public function getPassword(){
        return $this->mdp;
    }

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }

    public function setPassword($mdp){
        $this->mdp = $mdp;
    }

}

?>