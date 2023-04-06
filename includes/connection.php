<?php
    $dbHost = "local";
    $dbType = "mysql";
    $dbPort = "3306";
    $dbDatabase = "telas_exemplo";
    $dbUser = "root";
    $dbPassword = "";

    $dsn = $dbType; 
    $dsn .=  ":dbname=" . $dbDatabase; 
    $dsn .=  ";host" . $dbHost; 
    $dsn .=  ";port" . $dbPort;

    $pdo = new PDO($dsn, $dbUser, $dbPassword);
?>