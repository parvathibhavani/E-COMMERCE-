<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Table</title>
</head>
<body>
    <form method="post" action="">
        Enter ID: <input type="text" name="username">
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="details";
    $str="mysql:host=".$host.";dbname=".$db;
    
    try {
        $con=new PDO($str,$user,$pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(isset($_POST['submit'])){
            $id = $_POST['username'];

        
            $sql = "SELECT * FROM information WHERE username = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$id]); 
            if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<p>Username: " . $row['username'] . "</p>";
                echo "<p>Product Name: " . $row['pro_name'] . "</p>";
                echo "<p>Product Category: " . $row['pro_cat'] . "</p>";
                echo "<p>Product Price: " . $row['pro_price'] . "</p>";
                echo "<p>Product Quantity: " . $row['pro_quan'] . "</p>";
            } else {
                echo "No user found with ID: $id";
            }
        }
    } catch(PDOException $e) {
        echo "Connection error: " . $e->getMessage();
    }
    
    $con = null; // Close connection
    ?>
</body>
</html>