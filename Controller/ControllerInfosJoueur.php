<?php

class ControllerInfosJoueur extends Controller {
    public function action_infosJoueur(){
        $mod = Model::getModel();
        /**
         * Récuperer les infos d'un joueur (on a son pseudo dans le post)
         */
        
        $pseudo = htmlspecialchars($_POST["username"]);
        $playerPatt = $mod->findScoreByPseudo($pseudo);
        $data = ["joueur" => $playerPatt];
        $this->render("InfosJoueur", $data);

    }

    public function action_default(){
        $this->action_infosJoueur();
    }
}
