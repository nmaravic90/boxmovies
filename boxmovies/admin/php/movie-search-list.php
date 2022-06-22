<?php
require_once 'config.php';
$title = $_POST['title'];
$genre = $_POST['genre'];
$rating = $_POST['rating'];
$orderBy = $_POST['orderBy'];

$value  = 8;
$index = $_POST['index']-1;
$str = $index * $value;

if(isset($index) || isset($title) || isset($genre) || isset($rating) || isset($orderBy) ){
    // $sql = "SELECT * FROM MOVIE WHERE TITLE like '%$title%' OR RATING >= $rating*1.0 OR GENRE = '$genre';";
    $sql = "SELECT * FROM MOVIE WHERE RATING >= $rating*1.0 limit $str, $value";
    $query = mysqli_query(connection(), $sql);
    $movie = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $movie[]=$row;
    }
    $movieJSON = json_encode($movie);
    echo $movieJSON;  
}
mysqli_close(connection());
?>