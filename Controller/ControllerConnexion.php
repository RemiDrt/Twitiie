<?php 

class ControllerConnexion extends Controller{

  public function action_connexion(){

    $mod = Model::getModel();

    $req = $mod->findPlayerByMail(htmlspecialchars($_POST['mail']));

    // Si e-mail indiqué dans le formulaire 
    if( $req != false AND isset($_POST['mail']) ){


		$passwordEncrypted = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
		  // Si le mot de passe encrypté correspond au mot de passe encrypté de la bdd
    	if ( password_verify(htmlspecialchars($_POST['password']), $req['password'] ) ) {
			session_start();
			$_SESSION['userObject'] = $req;
    		$data = ['userID' => $req['id'] ];
    		$this->render("Home", $data);

    	} else{

    		$data = ['e_message' => "Mot de passe incorrect"];
    		$this->render("Connexion", $data);

    	}

    }

     if ( $req == false AND isset($_POST['mail'])) {

    	$data = ['e_message' => "E-mail Incorrect"];
    	$this->render("Connexion", $data);

    }
    	

    if (!isset($_POST['mail'])) {

    	$data = ['e_message' => ""];
    	$this->render("Connexion", $data);

    }

  }


	/**
	* Action par défaut du contrôleur (à définir dans les classes filles)
	*/
	public function action_default(){
		$this->action_connexion();
	}




}






















