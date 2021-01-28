<?php

class ControllerHome extends Controller {
    public function action_home(){
        $mod = Model::getModel();
        /**
         * tester les fonction et mettre tous les resultats dans le tableau $data
         */
        $data = [];
        $this->render("Home", $data);

    }

    public function action_default(){
        $this->action_home();
    }
}
