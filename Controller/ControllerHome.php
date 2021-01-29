<?php

class ControllerHome extends Controller {


    public function action_home(){
        /*
         * tester les fonction et mettre tous les resultats dans le tableau $data
         */
        $top10 = $this->findTops10();
        $scores = $this->findScore();
        $data = [
          'Tops10' => $top10,
          'Player' => $scores,
        ];
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
}
