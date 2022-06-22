<?php
require_once 'config.php';

if(isset($_POST['username'])){
    $username = $_POST['username'];
}
if(isset($_POST['id_movie'])){
    $id_movie = $_POST['id_movie'];
}
if(isset($_POST['current_date'])){
    $current_date = $_POST['current_date'];
}
if(isset($_POST['current_time'])){
    $current_time = $_POST['current_time'];
}

$sql = "SELECT ID FROM USER WHERE USERNAME = '$username'";
$query = mysqli_query(connection(), $sql);

$row = mysqli_fetch_assoc($query);
$id_user = $row['ID'];

    $sql = "INSERT INTO  PREVIEW VALUES ('$id_movie', '$id_user', '$current_date', '$current_time')";
    $query = mysqli_query(connection(), $sql);
    if($query){
        echo true;
    }
    mysqli_close(connection());

?>