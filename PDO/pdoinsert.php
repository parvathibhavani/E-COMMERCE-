<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Information </title>
</head>
<body>
    <?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="details";
    $str="mysql:host=".$host.";dbname=".$db;
    echo "good";
    try {
        $con=new PDO($str,$user,$pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "good";
            $sku = $_POST["username"];
            $productName = $_POST["productName"];
            $productCategory = $_POST["productCategory"];
            $productPrice = $_POST["productPrice"];
            $productQuantity = $_POST["productQuantity"];
            echo "good";
            // SQL to insert data into table using prepared statements with array
            $sql = "INSERT INTO information (username, pro_name, pro_cat, pro_price, pro_quan) 
                    VALUES (:sku, :productName, :productCategory, :productPrice, :productQuantity)";
            
            $stmt = $con->prepare($sql);
            
            $stmt->execute([
                ':sku' => $sku,
                ':productName' => $productName,
                ':productCategory' => $productCategory,
                ':productPrice' => $productPrice,
                ':productQuantity' => $productQuantity
            ]);
            
            echo "DATA SAVED";
        
    } catch(PDOException $e) {
        echo "Connection error: " . $e->getMessage();
    }
    
    $con = null; // Close connection
    ?>
</body>
</html>
