<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="details";
    $str="mysql:host=".$host.";dbname=".$db;
    
    try {
        $con=new PDO($str,$user,$pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM information";
        $stmt = $con->query($sql);
        
        
        echo "<table border='1'>
                <tr>
                    <th>Username</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                </tr>";
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['pro_name'] . "</td>";
            echo "<td>" . $row['pro_cat'] . "</td>";
            echo "<td>" . $row['pro_price'] . "</td>";
            echo "<td>" . $row['pro_quan'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } catch(PDOException $e) {
        echo "Connection error: " . $e->getMessage();
    }
    
    $con = null; // Close connection
    ?>
</body>
</html>