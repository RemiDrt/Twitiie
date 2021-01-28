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
        if ($pass != $pass_conf) {
            echo "test pass differents";
            $data["message_err"] = "Erreurs veuillez saisir le même mot de passe";
            $this->render("Inscription", $data);
            echo "test pass differents";
        }
        elseif($mod->PlayerMailExist($mail)){
            echo "mail exi";
            $data["message_err"] = "Erreurs mail dejà attribuée";
            $this->render("Inscription", $data);
        }
        elseif($mod->PlayerPseudoExist($pseudo)) {
            echo "pseudo exi";
            $data["message_err"] = "Erreurs pseudo dejà attribué";
            $this->render("Inscription", $data);
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
