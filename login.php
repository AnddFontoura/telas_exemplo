<?php

    if (isset($_POST)) {
        include_once('includes/connection.php');

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