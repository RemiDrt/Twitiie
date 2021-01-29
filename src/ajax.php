<?php 


require '../Model/Model.php';

$json = json_decode(file_get_contents("php://input"));

$score = intVal($json->score);

$pattern = strVal( implode("", $json->pattern) );

$pattern = str_replace("0","p", $pattern);

$pattern = str_replace("1","f", $pattern);

$mod = Model::getModel();

$mod->updateScorePlayerById( 5, $score, $pattern );



