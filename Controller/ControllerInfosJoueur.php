<?php

class ControllerInfosJoueur extends Controller {
    public function action_infosJoueur(){
        /**
         * Récuperer les infos d'un joueur (on a son pseudo dans le post)
         */
        $this->render("InfosJoueur", findScore(htmlspecialchars($_POST['username'])));

    }

    public function action_default(){
        $this->action_infosJoueur();
    }

    public function findScore($pseudoUser){
      $mod = Model::getModel();
      $result = $mod->findScoreByPseudo($pseudoUser);
      $data['Pseudo'] = $result['pseudo'];
      $data['PlayerScoreWeek'] = $result['scoreweek'];
      $data['PlayerPatternWeek'] = $result['paternweek'];
      $data['PlayerScoreMon'] = $result['scoremon'];
      $data['PlayerPatternMon'] = $result['paternmon'];
      $data['PlayerScoreTot'] = $result['scoretot'];
      $data['PlayerPatternTot'] = $result['paterntot'];
      return $data;
    }
}
