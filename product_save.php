<?php
    
    session_start();
    
    if (isset($_POST)) {
        $data = $_POST;

        include_once('includes/connection.php');

        $sql = "
            INSERT INTO
                products
                (`name`, `sku`, `description`, `price`, `image_path`)
                VALUES
                (:pName, :pSku, :pDescription, :pPrice, '');
        ";

        $query = $pdo->prepare($sql);
        $query->bindValue(':pName', $data['productName'], PDO::PARAM_STR);
        $query->bindValue(':pSku', $data['productSku'], PDO::PARAM_STR);
        $query->bindValue(':pDescription', $data['productDescription'], PDO::PARAM_STR);
        $query->bindValue(':pPrice', $data['productPrice'], PDO::PARAM_INT);
        $result = $query->execute();
        $productId = $pdo->lastInsertId();

        if ($result) {

            //Upload de imagem
            if (isset($_FILES['inputImage'])) {
                $fileName = $_FILES['inputImage']['name'];
                $fileNameExploded = explode('.', $fileName);
                $fileExtension = $fileNameExploded[sizeof($fileNameExploded) - 1];
                $fileMimeType = $_FILES['inputImage']['type'];
                $fileTmpName = $_FILES['inputImage']['tmp_name'];
                $fileError = $_FILES['inputImage']['error'];
                $fileSize = $_FILES['inputImage']['size'];

                if (!$fileError) {
                    $fileNewName = $productId  . '_'  . date('U') . '_' . md5($fileName) . '.' . $fileExtension;

                    $arrayAllowed = [
                        'jpeg' => 'image/jpeg',
                        'png' => 'image/png',
                        'bmp' => 'image/bmp',
                        'jpg' => 'image/jpeg',
                    ];

                    if (in_array($fileMimeType, $arrayAllowed)) {
                        if ($arrayAllowed[$fileExtension] === $fileMimeType) {
                            if(!is_dir('upload/products')) {
                                mkdir('upload/products', 0444, true);
                            }

                            move_uploaded_file($fileTmpName, 'upload/products/' . $fileNewName);

                            $sql = "
                                UPDATE 
                                    products
                                SET 
                                    image_path = :imagePath 
                                WHERE 
                                    id = :productId
                                ";

                            $query = $pdo->prepare($sql);
                            $query->bindValue(':imagePath', $fileNewName, PDO::PARAM_STR);
                            $query->bindValue(':productId', $productId, PDO::PARAM_INT);
                            $result = $query->execute();
                        }
                    }
                }
            }

            $_SESSION['product_save_success'] = 1;
            header('Location: '. 'dashboard.php');
        } else {
            echo "Deu ruim";
        }
    }
?>