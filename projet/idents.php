<?php
session_start(); # Ouverture des sessions
 
define('HOST', 'localhost');
define('USER','root');
define('PASSWORD','');
define('BDD','realtea');
define('PORT','3306');
 
try
{
    $bdd = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.BDD, USER, PASSWORD);
}
catch(Exception $err)
{
    die('erreur ['.$err->getCode().'] '.$e->getMessage());
}
?>