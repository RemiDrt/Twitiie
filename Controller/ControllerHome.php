<?php

class ControllerHome extends Controller {


    public function action_home(){
        $mod = Model::getModel();
        /*
         * tester les fonction et mettre tous les resultats dans le tableau $data
         */
        $data = array_merge(findTops10(), findScore());
        $this->render("Home", $data);

    }

    public function action_default(){
        $this->action_home();
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
      $pseudoUser = $_SESSION["userObject"]['pseudo'];
      $result = $mod->findScoreByPseudo($pseudoUser);
      $data['PlayerScoreWeek'] = $result['scoreweek'];
      $data['PlayerPatternWeek'] = $result['paternweek'];
      $data['PlayerScoreMon'] = $result['scoremon'];
      $data['PlayerPatternMon'] = $result['paternmon'];
      $data['PlayerScoreTot'] = $result['scoretot'];
      $data['PlayerPatternTot'] = $result['paterntot'];
      return $data;
    }
}
