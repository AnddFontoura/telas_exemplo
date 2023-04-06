<?php
    
    session_start();
    
    if (isset($_POST)) {
        $data = $_POST;

        include_once('includes/connection.php');

        $sql = "
            INSERT INTO
                products
                (`name`, `sku`, `description`, `price`)
                VALUES
                (:pName, :pSku, :pDescription, :pPrice);
        ";

        $query = $pdo->prepare($sql);
        $query->bindValue(':pName', $data['productName'], PDO::PARAM_STR);
        $query->bindValue(':pSku', $data['productSku'], PDO::PARAM_STR);
        $query->bindValue(':pDescription', $data['productDescription'], PDO::PARAM_STR);
        $query->bindValue(':pPrice', $data['productPrice'], PDO::PARAM_INT);
        $result = $query->execute();

        if ($result) {
            $_SESSION['product_save_success'] = 1;
            header('Location: '. 'dashboard.php');
        } else {
            echo "Deu ruim";
        }
    }
?>