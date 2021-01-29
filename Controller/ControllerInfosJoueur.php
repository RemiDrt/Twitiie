<?php

class ControllerInfosJoueur extends Controller {
    public function action_infosJoueur(){
        /**
         * Récuperer les infos d'un joueur (on a son pseudo dans le post)
         */
        echo "coucou action_infosJoueur";
        var_dump($_POST);
        $pseudo = htmlspecialchars($_POST["username"]);
        echo "apres html special schars";
        $data = $this->findScore($pseudo);
        echo "apres fct find score";
        $this->render("InfosJoueur", $data);
    }

    public function action_default(){
        $this->action_infosJoueur();
    }

    public function findScore($pseudoUser){
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
}
