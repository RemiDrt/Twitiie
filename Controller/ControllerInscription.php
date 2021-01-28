<?php

class ControllerInscription extends Controller {
    public function action_inscription(){
        $mod = Model::getModel();
        /**
         * tester les fonction et mettre tous les resultats dans le tableau $data
         */
        $data = [];
        $this->render("Test", $data);
        
    }

    public function action_default(){
        $this->action_inscription();
    }
}
?>