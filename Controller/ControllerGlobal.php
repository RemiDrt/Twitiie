<?php 

class ControllerGlobal extends Controller {

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
                $this->action_home($data);
    
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



    public function action_home($data = []){
        /*
         * tester les fonction et mettre tous les resultats dans le tableau $data
         */
        $top10 = $this->findTops10();
        $scores = $this->findScore();
        $data['Tops10'] = $top10;
        $data['Player'] = $scores;
        $this->render("Home", $data);

    }


    private function findTops10(){
        $mod = Model::getModel();
        $result = $mod->findTop10Week();
        $i = 0;
        foreach ($result as $value) {
          $data['Top10Week'][$i]['pseudo'] = $value['pseudo'];
          $data['Top10Week'][$i]['score'] = $value['score'];
          $i = $i+1;
        }
        $result = $mod->findTop10Mon();
        $i = 0;
        foreach ($result as $value) {
          $data['Top10Mon'][$i]['pseudo'] = $value['pseudo'];
          $data['Top10Mon'][$i]['score'] = $value['score'];
          $i = $i+1;
        }
        $result = $mod->findTop10Tot();
        $i = 0;
        foreach ($result as $value) {
          $data['Top10Tot'][$i]['pseudo'] = $value['pseudo'];
          $data['Top10Tot'][$i]['score'] = $value['score'];
          $i = $i+1;
        }
        return $data;
    }
  
    public function findScore(){
        $mod = Model::getModel();
        session_start();
        $pseudoUser = $_SESSION["userObject"]['pseudo'];
        $result = $mod->findScoreByPseudo($pseudoUser);
        $data['PlayerScoreWeek'] = $result['scoreweek'];
        $data['PlayerPatternWeek'] = $result['patternweek'];
        $data['PlayerScoreMon'] = $result['scoremon'];
        $data['PlayerPatternMon'] = $result['patternmon'];
        $data['PlayerScoreTot'] = $result['scoretot'];
        $data['PlayerPatternTot'] = $result['patterntot'];
        return $data;
    }


    public function action_infosJoueur(){
        /**
         * Récuperer les infos d'un joueur (on a son pseudo dans le post)
         */
        $pseudo = htmlspecialchars($_POST["username"]);
        $data = $this->findScoreInfos($pseudo);
        $this->render("InfosJoueur", $data);
    }


    public function findScoreInfos($pseudoUser){
        $mod = Model::getModel();
        $result = $mod->findScoreByPseudo($pseudoUser);
        $data['Pseudo'] = $result['pseudo'];
        $data['PlayerScoreWeek'] = $result['scoreweek'];
        $data['PlayerPatternWeek'] = $result['patternweek'];
        $data['PlayerScoreMon'] = $result['scoremon'];
        $data['PlayerPatternMon'] = $result['patternmon'];
        $data['PlayerScoreTot'] = $result['scoretot'];
        $data['PlayerPatternTot'] = $result['patterntot'];
        return $data;
    }


    public function action_inscription(){
        $data = [];
        $this->render("Inscription", $data);
    }

    public function action_formInscription(){
        $mod = Model::getModel();
        $pass = htmlspecialchars($_POST["password"]);
        $pass_conf = htmlspecialchars($_POST["re-password"]);
        $usr = htmlspecialchars($_POST["username"]);
        $mail = htmlspecialchars($_POST["email"]);
        $data = [];
        if ($pass != $pass_conf) {
            $data["message_err"] = "Erreurs veuillez saisir le même mot de passe";
            $this->render("Inscription", $data);
        }
        $test1 = $mod->PlayerMailExist($mail);
        if( $test1 != false){
            $data["message_err"] = "Erreurs mail dejà attribuée";
            $this->render("Inscription", $data);
        }
        if($mod->PlayerPseudoExist($usr)) {
            $data["message_err"] = "Erreurs pseudo dejà attribué";
            $this->render("Inscription", $data);
        }
        $mdp_crypt = password_hash($pass, PASSWORD_DEFAULT);
        $player = new Player($usr, $mail, $mdp_crypt);
        $req = $mod->createPlayer($player);
        $data["message_success"] = "Joueur ajouter avec succès";
        $this->render("Connexion", $data);
        $this->action_connexion();

    }

    




    /**
	* Action par défaut du contrôleur (à définir dans les classes filles)
	*/
	public function action_default(){
		$this->action_connexion();
	}
    
}