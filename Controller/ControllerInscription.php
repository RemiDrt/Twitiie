<?php

class ControllerInscription extends Controller {
    public function action_inscription(){
        $data = [];
        echo "bonjour";
        $this->render("Inscription", $data);
    }

    public function action_formInscription(){
        echo "test insc 1";
        $mod = Model::getModel();
        $pass = htmlspecialchars($_POST["password"]);
        $pass_conf = htmlspecialchars($_POST["re-password"]);
        $usr = htmlspecialchars($_POST["username"]);
        $mail = htmlspecialchars($_POST["email"]);
        $data = [];
        echo "test 2 ";
        var_dump($_POST);
        var_dump($mod);
        if ($pass != $pass_conf) {
            echo "test pass differents";
            $data["message_err"] = "Erreurs veuillez saisir le même mot de passe";
            $this->render("Inscription", $data);
            echo "test pass differents";
        }
        else{
            echo "bons mdp";
        }
        $test1 = "vrai";
        echo $test1;
        echo $mail;
        $test1 = $mod->PlayerMailExist($mail);
        echo "fonction done ";
        if( $test1 != false){
            echo "mail exi";
            $data["message_err"] = "Erreurs mail dejà attribuée";
            $this->render("Inscription", $data);
        }
        else {
            echo "mail existe pas";
        }
        echo $usr;
        if($mod->PlayerPseudoExist($usr)) {
            echo "pseudo exi";
            $data["message_err"] = "Erreurs pseudo dejà attribué";
            $this->render("Inscription", $data);
        }
        else {
            echo "pseudo existe pas ";
        }
        echo "avant insert ";
        $mdp_crypt = password_hash($pass, PASSWORD_DEFAULT);
        $player = new Player($pseudo, $mail, $mdp_crypt);
        $req = $mod->createPlayer($player);
        $data["message_success"] = "Joueur ajouter avec succès";
        $this->render("Connexion", $data);

    }
    public function action_default(){
        $this->action_inscription();
    }
}
