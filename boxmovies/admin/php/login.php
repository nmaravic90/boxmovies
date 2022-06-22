<?php
require_once 'config.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($username) && isset($password)){
    $sql = "SELECT * FROM ADMIN WHERE USERNAME = '$username' AND PASSWORD = '$password'";
    $query = mysqli_query(connection(), $sql);
    $row = mysqli_num_rows($query);
    if($row==1){
        $user = mysqli_fetch_assoc($query);
            $_SESSION['admin'] = $user['username'];
            if(isset($_SESSION['admin'])){
                echo true;
            }
            echo false;
    }
    else{
        echo false;
    }
}
?>