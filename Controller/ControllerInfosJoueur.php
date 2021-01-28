<?php

class ControllerInfosJoueur extends Controller {
    public function action_infosJoueur(){
        $mod = Model::getModel();
        /**
         * tester les fonction et mettre tous les resultats dans le tableau $data
         */
        $data = [];
        $this->render("InfosJoueur", $data);
        
    }

    public function action_default(){
        $this->action_infosJoueurs();
    }
}
?>