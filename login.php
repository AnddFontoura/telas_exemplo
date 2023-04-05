<?php

    if (isset($_POST)) {
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

        $userEmail = $_POST['loginEmail'] ?? null;
        $userPassword = $_POST['loginPassword'] ?? null;

        $sql = "
            SELECT 
                id
            FROM
                users
            WHERE
                email = '$userEmail' AND
                password = '$userPassword'
        ";
        
        $query = $pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result) {
            require ('dashboard.php');
        } else {
            $error = "Login e/ou senha não coincidem";
            require ('index.php');
        }
    }

?>