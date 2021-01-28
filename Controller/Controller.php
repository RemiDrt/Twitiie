<?php
/**
 * Interface pour les differents controllers
 */
abstract class Controller {
    /**
     * Action par défaut du contrôleur (à définir dans les classes filles)
     */
    abstract public function action_default();

    /**
     * Constructeur. Lance l'action correspondante
     */
    public function __construct() {
        //Si dans l'url on a présicer l'action correspondant du contrôleur
        if(isset($_GET['action']) and method_exists($this, "action_".$_GET["action"])) {
            $action = "action_".$_GET["action"];
            $this->$action();
        } else {
            $this->action_default();//Sinon on fait l'action par défault du controlleur
        }
    }


    /**
     * Affiche la vue
     * @param string $vue nom de la vue
     * @param array $data tableau contenant les données à passer à la vue
     * @return aucun
     */
    protected function render($vue, $data = []) {
        //extraire les données à afficher
        extract($data);

        //tester si la vue existe 
        $file_name = "Views/View".$vue.'.php';
        if(file_exists($file_name)){
            include $file_name;
        } else {
            $this->action_error("la vue n'existe pas !");
        }
        die();//terminer le script
    }

    /**
     * Méthode affichant une page d'erreur
     * @param string $message Message d'erreur à afficher
     * @return aucun
     */
    protected function action_error($mesage = '') {
        $data = [
            'title' => "Error",
            'message' => $message
        ];
        $this->render("message", $data);
    }
}
?>