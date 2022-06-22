<?php
require_once 'config.php';
$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$address = $_POST['address'];

    $sql = "select * from user where username = '$username'";
    $query = mysqli_query(connection(), $sql);
    $row = mysqli_num_rows($query);
    if($row==1){
        echo false;
    }
    else{
        $sql = "insert into user values (DEFAULT, '$username', '$password', '$first_name', '$last_name', '$email', '$phone', '$city', '$address')";
        $query = mysqli_query(connection(), $sql);
        if($query){
            echo true;
        }
        mysqli_close(connection());
    }
?>