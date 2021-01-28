<?php 

class ControllerConnexion extends Controller{

  public function action_connexion(){
<<<<<<< HEAD
    $mod = Model::getModel();
    $req = $mod->findPlayerByMail(htmlspecialchars($_POST['mail']));
    $data = ['UserObject' => $req];
=======
    //$mod = Model::getModel();
    //$req = $mod->findPlayerByMail($_POST['mail']);

    $data = ['UserObject' => 'req'];
>>>>>>> ae9ca94f3d8ed1ad18ac754c5173b569f96d8f13
    $this->render("Connexion", $data);
  }


	/**
	* Action par défaut du contrôleur (à définir dans les classes filles)
	*/
	public function action_default(){
		$this->action_connexion();
	}




}






















