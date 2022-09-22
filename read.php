<?php

$server   = "localhost";
$username = "root";
$password = "";
$db       = "db_school";

$conn = new mysqli($server, $username, $password, $db);
$rows = [];
// 2- check if form is submitted
if(isset($_GET["submit"])){
     // 3- GET filters (id, name, gender)
     $query = "SELECT * FROM students";
     if(!empty($_GET["id"])){
        $id = $_GET["id"];
        $query = $query . "WHERE id = $id ";
     }
       // 4- Use whatever is set (single or multiple filters) to find student(s)
     if(!empty($_GET["name"])){
         $name = $_GET["name"];
         $query .= str_contains($query, "WHERE") ? "OR" : "WHERE";
         $query =   $query . " name LIKE '%$name'";
     }
     if(!empty($_GET["gender"])){
        $gender = $_GET["gender"];
        $query .= str_contains($query, "WHERE") ? "OR" : "WHERE";
        $query =   $query . " name LIKE '%$gender'";
    }
    $result = $conn->query($query);
   
    if($result === false ){
        echo "the data not found";

    }else{
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    }
    echo $query ;

    
}

    // cases: 
        // all male/female students,
        // students having "ahmed" in their names, 
        // student with ID = 5

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
    <h1>Filter students by ID OR name OR gender</h1>
    <form action="" method="GET">
        <label for="id">ID:</label>
        <input type="number" name="id">
        <br>

        <label for="name">Name:</label>
        <input type="text" name="name">
        <br>

        <label for="gender">Gender:</label>
        <br>
        <input type="radio" name="gender" value="male">Male
        <br>
        <input type="radio" name="gender" value="female">Female
        <br>

        <input type="submit" value="Search" name="submit">
    </form>

    
</body>
</html>