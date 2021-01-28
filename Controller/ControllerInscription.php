<?php

class ControllerInscription extends Controller {
    public function action_inscription(){
        $mod = Model::getModel();
        $pass = htmlspecialchars($_POST["password"]);
        $pass_conf = htmlspecialchars($_POST["re-password"]);
        $usr = htmlspecialchars($_POST["username"]);
        $mail = htmlspecialchars($_POST["email"]);
        $data = [];
        if (not($pass == $pass_conf)) {
            $data["message_err"] = "Erreurs veuillez saisir le même mot de passe";
            $this->render("Inscription", $data);
        }
        else if($mod->PlayerMailExist($mail)){
            $data["message_err"] = "Erreurs mail dejà attribuée";
            $this->render("Inscription", $data);
        }
        else if($mod->PlayerPseudoExist($pseudo)) {
            $data["message_err"] = "Erreurs pseudo dejà attribué";
            $this->render("Inscription", $data);
        }
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
?>