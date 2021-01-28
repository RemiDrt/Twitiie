<?php
class Model {

    /** 
     * Attribut contenant l'instance PDO
    **/
    private $bd;

    /** 
     * Attribut statique qui contiendra l'unique instance de Model
    **/
    private static $instance = null;

    /**
     * Constructeur : effectue la connexion à la base de données
     */
    private function _construct(){
        try {
            $this->bd = new PDO('pgsql:dbname=cointflip_guillaume_descroix;host=pgsql', 'tpphp', 'tpphp');
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bd->query("SET names 'utf-8'");
        } catch(PDOException $e){
            die('Echec connexion, erreur n°' . $e->getCode() . ':' . $e->getMessage());
        }
    }

    /**
     * Methode permettant de récupérer un modèle car le constructeur est privé 
     */
    public static function getModel() {
        if(is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }//permet de ne pas recréer une instance si on en a déjà incrémenté une




    /**
     * Méthodes relatives aux requêtes vers la base de donnée
     */
}

?>