<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        Enter ID to delete: <input type="text" name="username">
        <input type="submit" name="submit" value="Delete">
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

            
            $sql = "DELETE FROM information WHERE username = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$id]); 
            
            $affectedRows = $stmt->rowCount();

            if($affectedRows > 0) {
                echo "Record with ID: $id has been deleted successfully.";
            } else {
                echo "No record found with ID: $id to delete.";
            }
        }
    } catch(PDOException $e) {
        echo "Connection error: " . $e->getMessage();
    }
    
    $con = null; 
    ?>
</body>
</html>
