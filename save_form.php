<?php

$conn = mysqli_connect("localhost", "root", "", "php_db");

$name = $_POST['fullname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$country = $_POST['country'];
// echo $country;
// exit();

$sql = "INSERT INTO ajax_serialize_form(name, age, gender, country) VALUES ('{$name}', $age, '{$gender}', '{$country}')";
// echo $sql;
// exit();

if(mysqli_query($conn, $sql)){
    echo "Hello {$name} your record is saved.";
}else{
    echo "Can't save form data.";
}

?>