<?php

// 1- Connect to school_db
$server   = "localhost";
$username = "root";
$password = "";
$db       = "db_school";
$conn = new mysqli($server, $username, $password, $db);

// 2- Check if form is submitted
if(isset($_POST['submit'])){
    // 3- get ID and DELETE it from students table
    $id  = $_POST["id"];
    $sql    = " DELETE FROM students where id = 3";
    $result = $conn->query($sql);
   
    if($result){
        echo "error operation ";
    }else{
        echo " deleted the field"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="post">
        <label for="id">Student ID:</label>
        <input type="number" name="id">
        <br>

        <input type="submit" value="Delete" name="submit">
    </form>

</body>
</html>