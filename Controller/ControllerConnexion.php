<?php 

class ControllerConnexion extends Controller{

  public function action_connexion(){
    //$mod = Model::getModel();
    //$req = $mod->getUserConnexion( htmlspecialchars( $_POST['pseudo'] ), htmlspecialchars( $_POST['password'] ));
    $data = ['User' => "ok"];
    $this->render("Connexion", $data);
  }


	/**
	* Action par défaut du contrôleur (à définir dans les classes filles)
	*/
	public function action_default(){
		$this->action_connexion();
	}




}






















