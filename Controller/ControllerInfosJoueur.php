<?php

class ControllerInfosJoueur extends Controller {
    public function action_infosJoueur(){
        $mod = Model::getModel();
        /*
         * tester les fonction et mettre tous les resultats dans le tableau $data
         */
        $data = [];
        $this->render("InfosJoueur", $data);

    }

    public function action_default(){
        $this->action_infosJoueurs();
    }

    public function findScore($pseudoUser){
      $mod = Model::getModel();
      $result = $mod->findScoreByPseudo($pseudoUser);
      $data['Pseudo'] = $value['pseudo'];
      $data['PlayerScoreWeek'] = $value['scoreweek'];
      $data['PlayerPatternWeek'] = $value['paternweek'];
      $data['PlayerScoreMon'] = $value['scoremon'];
      $data['PlayerPatternMon'] = $value['paternmon'];
      $data['PlayerScoreTot'] = $value['scoretot'];
      $data['PlayerPatternTot'] = $value['paterntot'];
      return $data;
    }
}
