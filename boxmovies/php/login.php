<?php
require_once 'config.php';
// class User{
//     var $username;
//     var $password;
//     var $firstname;
//     var $lastname;
//     var $email;
//     var $phone;
//     var $city;
//     var $address;
// }
session_start();
	$username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "select * from user where username = '$username' and password = '$password'";
    $query = mysqli_query(connection(), $sql);
    $row = mysqli_num_rows($query);
    if($row==1){

        // $user = mysqli_fetch_assoc($query);
        // $_SESSION['user'] = serialize($user);
        // echo $_SESSION['user'];
        // $_SESSION['user'] = $user['username'];
        // echo $_SESSION['user'];


        // $user = array();
        // $user = new User();
        $user = array();
        while ($row =  mysqli_fetch_array($query)) {
        // $user->username = $row['username'];
        // $user->password = $row['password'];
        // $user->firstname = $row['firstname'];
        // $user->lastname = $row['lastname'];
        // $user->email = $row['email'];
        // $user->city = $row['city'];
        // $user->address = $row['address'];
        // $user->lastname = $row['lastname'];
        $user[]=$row;
        }
        $_SESSION['user'] = serialize($user);
        echo $_SESSION['user'];
        // var_dump($_SESSION['user']);
    }
    else{
        echo false;
    }
    mysqli_close(connection());
?>