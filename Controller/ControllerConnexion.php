<?php 

class Controller_connexion extends Controller{

  public function action_connexion(){
    $mod = Model::getModel(); 
    $req = $mod->getUserConnexion();
    $data = ['User' => $req];
    $this->render("connexion", $data);
  }


	/**
	* Action par défaut du contrôleur (à définir dans les classes filles)
	*/
	public function action_default(){
		$this->action_home();
	}


}






















