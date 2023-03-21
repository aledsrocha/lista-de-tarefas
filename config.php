<?php 

    session_start();
    $base = 'http://localhost/tarefas';

    $db_name = 'tarefas';
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';

    $pdo = new PDO("mysql:dbname=$db_name;host=$db_host;", $db_user, $db_pass);
 ?>