<?php

require_once "Model/Model.php"; //Inclusion du modèle
require_once "Model/Player.php"; // a voir dans le futur si on en a vrmt besoin ici
require_once "Controller/Controller.php"; //Inclusion de la classe Controller

$controllers = ["Connexion", "Home", "InfosJoueurs", "Insciprion", "Jeux"];
$controller_default = "Connexion";

//On teste si le paramètre controller existe et correspond à un controlleur de la liste $controllers
if (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
    $nom_controller = $_GET['controller'];
} else {
    $nom_controller = $controller_default;
}

//on determine le nom de l aclasse du contrôleur
$nom_classe = 'Controller'.$nom_controller;

//on determine le nom du fihier contenant la définition du controleur
$nom_fichier = 'Controller/'.$nom_classe.'.php';

//Si le fichier existe
if(file_exists($nom_fichier)) {
    include_once $nom_fichier;
    $controller = new $nom_classe();
} else {
    exit("Error 404: not found!");
}

?>