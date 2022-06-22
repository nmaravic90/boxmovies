<?php
$host = 'localhost';
$db_name = 'boxmovie';
$db_username = 'root';
$db_pass = '';

function connection() {
    global $host, $db_name, $db_username, $db_pass;
    $conn = mysqli_connect($host,$db_username,$db_pass,$db_name);
    if($conn){
        return $conn;
    }
    else {
        die("DB error" . mysql_error());
    }
}
?>