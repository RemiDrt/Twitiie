<?php
class Model {

  /*
   * Attribut contenant l'instance PDO
   */
  private $bd;

  /*
   * Attribut statique qui contiendra l'unique instance de Model
   */
  private static $instance = null;

  /*
   * Constructeur : effectue la connexion à la base de données
   */
  private function __construct(){
    try {
      $this->bd = new PDO('pgsql:dbname=coinflip_guillaume_descroix;host=pgsql', 'tpphp', 'tpphp');
      $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->bd->query("SET names 'utf-8'");
    } catch(PDOException $e){
      die('Echec connexion, erreur n°' . $e->getCode() . ':' . $e->getMessage());
    }
  }

  /*
   * Methode permettant de récupérer un modèle car le constructeur est privé
   */
  public static function getModel() {
    if(is_null(self::$instance)) {
      self::$instance = new Model();
    }
    return self::$instance;
  }//permet de ne pas recréer une instance si on en a déjà incrémenté une

  /*
   * Méthodes relatives aux requêtes vers la base de donnée
   */

  /*
   *
   */
  function createPlayer(Player $player) {
    for ($i = 0; $i < 3; $i++) {
      //Création patterne
      $sql = <<<SQL
        INSERT INTO PATTERN(pattern)
        VALUES('n');
      SQL;
      $stmt = $this->bd->prepare($sql);
      $stmt->execute();

      //Création score
      $sql = <<<SQL
        INSERT INTO SCORE(score,id_pattern)
        VALUES(0, currval('PATTERN_ID'));
      SQL;
      $stmt = $this->bd->prepare($sql);
      $stmt->execute();
    }

    //Création Joueur
    $sql = <<<SQL
      INSERT INTO PLAYER(pseudo,mail,password,id_score_tot,id_score_mon,id_score_week)
      VALUES(:pseudo, :mail, :password, currval('SCORE_ID'), currval('SCORE_ID')-1, currval('SCORE_ID')-2);
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->bindValue(':pseudo', $player->getPseudo(), \PDO::PARAM_STR);
    $stmt->bindValue(':mail', $player->getMail(), \PDO::PARAM_STR);
    $stmt->bindValue(':password', $player->getPassword(), \PDO::PARAM_STR);
    $stmt->execute();
  }

  /*
   *
   */
  function updateScorePlayerById(int $id, int $score, string $pattern){
    $sql = <<<SQL
      SELECT id_score, score, id_pattern
      FROM PLAYER INNER JOIN SCORE ON PLAYER.id_score_tot = SCORE.id_score
      WHERE id_player = :id;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_FIRST);
    if($row[1] >= $score){
      $sql = <<<SQL
        UPDATE SCORE
        SET score = :score
        WHERE id_score = :id;
      SQL;
      $stmt->bindValue(':id', $row[0], \PDO::PARAM_INT);
      $stmt->bindValue(':score', $score, \PDO::PARAM_INT);
      $stmt->execute();

      $sql = <<<SQL
        UPDATE pattern
        SET pattern = :pattern
        WHERE id_pattern = :id;
      SQL;
      $stmt->bindValue(':id', $row[2], \PDO::PARAM_INT);
      $stmt->bindValue(':pattern', $pattern, \PDO::PARAM_STR);
      $stmt->execute();
    }

    $sql = <<<SQL
      SELECT id_score, score, id_pattern
      FROM PLAYER INNER JOIN SCORE ON PLAYER.id_score_mon = SCORE.id_score
      WHERE id_player = :id;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_FIRST);
    if($row[1] >= $score){
      $sql = <<<SQL
        UPDATE SCORE
        SET score = :score
        WHERE id_score = :id;
      SQL;
      $stmt->bindValue(':id', $row[0], \PDO::PARAM_INT);
      $stmt->bindValue(':score', $score, \PDO::PARAM_INT);
      $stmt->execute();

      $sql = <<<SQL
        UPDATE pattern
        SET pattern = :pattern
        WHERE id_pattern = :id;
      SQL;
      $stmt->bindValue(':id', $row[2], \PDO::PARAM_INT);
      $stmt->bindValue(':pattern', $pattern, \PDO::PARAM_STR);
      $stmt->execute();
    }

    $sql = <<<SQL
      SELECT id_score, score, id_pattern
      FROM PLAYER INNER JOIN SCORE ON PLAYER.id_score_week = SCORE.id_score
      WHERE id_player = :id;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_FIRST);
    if($row[1] >= $score){
      $sql = <<<SQL
        UPDATE SCORE
        SET score = :score
        WHERE id_score = :id;
      SQL;
      $stmt->bindValue(':id', $row[0], \PDO::PARAM_INT);
      $stmt->bindValue(':score', $score, \PDO::PARAM_INT);
      $stmt->execute();

      $sql = <<<SQL
        UPDATE pattern
        SET pattern = :pattern
        WHERE id_pattern = :id;
      SQL;
      $stmt->bindValue(':id', $row[2], \PDO::PARAM_INT);
      $stmt->bindValue(':pattern', $pattern, \PDO::PARAM_STR);
      $stmt->execute();
    }
  }

  /*
   *
   */
  function PlayerPseudoExist(string $pseudo){
    $sql = <<<SQL
      SELECT id
      FROM PLAYER
      WHERE pseudo = :pseudo;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
    $stmt->execute();
    if($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_FIRST))
      return True;
    else
      return False;
  }

  /*
   *
   */
  function PlayerMailExist(string $mail){
    $sql = <<<SQL
      SELECT id
      FROM PLAYER
      WHERE mail = :mail;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->bindValue(':mail', $mail, \PDO::PARAM_STR);
    $stmt->execute();
    if($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_FIRST))
      return True;
    else
      return False;
  }

  /*
   *
   */
  function findPasswordByMail(string $mail){
    $sql = <<<SQL
      SELECT password
      FROM PLAYER
      WHERE mail = :mail;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->bindValue(':mail', $mail, \PDO::PARAM_STR);
    $stmt->execute();
    if($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_FIRST))
      return $row[0];
    else
      return False;
  }

  /*
   *
   */
  function findPasswordByPseudo(string $pseudo){
    $sql = <<<SQL
      SELECT password
      FROM PLAYER
      WHERE pseudo = :pseudo;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
    $stmt->execute();
    if($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_FIRST))
      return $row[0];
    else
      return False;
  }

  /*
   *
   */
  function findTop10Tot(){
    $sql = <<<SQL
      SELECT pseudo, score
      FROM PLAYER INNER JOIN SCORE ON PLAYER.id_score_tot = SCORE.id_score
      ORDER BY score DESC
      FETCH FIRST 10 ROWS ONLY;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  /*
   *
   */
  function findTop10Mon(){
    $sql = <<<SQL
      SELECT pseudo, score
      FROM PLAYER INNER JOIN SCORE ON PLAYER.id_score_mon = SCORE.id_score
      ORDER BY score DESC
      FETCH FIRST 10 ROWS ONLY;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  /*
   *
   */
  function findTop10Week(){
    $sql = <<<SQL
      SELECT pseudo, score
      FROM PLAYER INNER JOIN SCORE ON PLAYER.id_score_week = SCORE.id_score
      ORDER BY score DESC
      FETCH FIRST 10 ROWS ONLY;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  /*
   *
   */
  function PlayerMailExist(string $mail){
    $sql = <<<SQL
      SELECT id
      FROM PLAYER
      WHERE mail = :mail;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->bindValue(':mail', $mail, \PDO::PARAM_STR);
    $stmt->execute();
    if($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_FIRST))
      return True;
    else
      return False;
  }

  /*
   *
   */
  function findPlayerByMail(string $mail){
    $sql = <<<SQL
      SELECT *
      FROM PLAYER
      WHERE mail = :mail;
    SQL;
    $stmt = $this->bd->prepare($sql);
    $stmt->bindValue(':mail', $mail, \PDO::PARAM_STR);
    $stmt->execute();
    if($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_FIRST))
      return $row;
    else
      return False;
  }
}

?>
