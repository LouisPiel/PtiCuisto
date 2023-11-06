<?php 
    //Récupération des infos de connexion dans fichier .env
    $db_host= getenv('host');
    $db_port= getenv('port');
    $db_name= getenv('dbname');
    $db_username= getenv('username');
    $db_password= getenv('password');

    require('templates/homepage.php');
?>