<?php

// 1- connect to school_db 
$server   = "localhost";
$username = "root";
$password = "";
$db       = "db_school";

$conn = new mysqli($server, $username, $password, $db);
if($conn->connect_error){
    echo "error:" .$coon->server_error;
}

$student_id = $student_name = $student_age = $student_gender = "";
if(isset($_GET["id"])) {
    $id = $_GET["id"];

    // 2- SELECT student by id
    $id = 4;
    $sql    = "SELECT id from students id= $id";
    $reuslt = $conn->query($sql);
    if($reuslt === false ){
        echo ("<h1> Database connrction failed </h1>");

    }else{
        // 3- If student is found, set student_variables

        $student_id = "4"; // change this
        $student_name = "sara"; // and so on ..
        $student_age = "23";
        $student_gender = "female";
        $sql = "UPDATE students SET  name =' $student_name', id= $student_id, age=$student_age, gender= '$student_gender' WHERE id = 4";
    }
}

if(isset($_POST["submit"])) {
    // 4- Use POST data to UPDATE student record
    // POST data: name, age, student_id
    $name       = $_POST['name'];
    $age        = $_POST['age'];
    $student_id = $_POST['student_id'];
    echo "data is true";
}
else{
    echo "data is missing";
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

    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $student_name ?>">
        <br>

        <label for="age">Age:</label>
        <input type="number" name="age" value="<?= $student_age ?>">
        <br>

        <label for="gender">Gender:</label>
        <br>
        <input type="radio" disabled name="gender" value="male" <?= $student_gender == "male" ? "checked" : "" ?>>Male
        <br>
        <input type="radio" disabled name="gender" value="female" <?= $student_gender == "female" ? "checked" : "" ?>>Female
        <br>

        <input type="hidden" name="student_id" value="<?= $student_id ?>">

        <input type="submit" value="Update" name="submit">
    </form>
    
</body>
</html>