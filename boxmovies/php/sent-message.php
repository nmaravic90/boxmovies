<?php
require_once 'config.php';
$name = $_POST['name'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$text = $_POST['message'];
if($name && $subject && $email && $text){
    $sql = "insert into message values (DEFAULT, '$name', '$subject', '$email', '$text')";
    $query = mysqli_query(connection(), $sql);
    if($query){
        echo true;
    }
    else{
        echo false;
    }
    mysqli_close(connection());
}
?>