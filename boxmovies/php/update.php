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

        $sql = "UPDATE USER SET PASSWORD = '$password', FIRST_NAME = '$first_name', LAST_NAME = '$last_name', EMAIL = '$email', PHONE = '$phone', CITY = '$city', ADDRESS = '$address' WHERE USERNAME = '$username'";
        $query = mysqli_query(connection(), $sql);
        if($query){
            echo true;
        }
        else{
            echo false;
        }
        mysqli_close(connection());
?>