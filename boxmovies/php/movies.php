<?php
require_once 'config.php';
$value  = 8;
$index = $_POST['index']-1;
$str = $index * $value;


if(isset($_POST['title'])){
    $title = $_POST['title'];
}
if(isset($_POST['year'])){
    $year = $_POST['year'];
}
if(isset($_POST['rating'])){
    $rating = $_POST['rating'];
}
if(isset($_POST['genre'])){
    $genre = $_POST['genre'];
}
if(isset($_POST['order'])){
    $order = $_POST['order'];
}


if(isset($index)){
$sql = "SELECT * FROM MOVIE ";
if(isset($title) || isset($year) || isset($rating) || isset($genre) || isset($order)) {
    $sql .= "WHERE ";

    if(isset($title)){
        $sql .= "TITLE LIKE '$title%' AND ";
    }
    if(isset($year)){
        $sql .= "YEAR = '$year' AND ";
    }
    if(isset($rating)){
        $sql .= "RATING >= '$rating' AND ";
    }
    if(isset($genre)){
        $sql .= "GENRE = '$genre' AND ";
    }  
    $sql = substr($sql, 0, -4);
    
    if(isset($order)){
        $sql .= " ORDER BY $order DESC ";
    }
}
$sql .= "LIMIT $str, $value";

$query = mysqli_query(connection(), $sql);
$movie = array();
while ($row = mysqli_fetch_assoc($query)) {
    $movie[]=$row;
}
mysqli_close(connection());
$movieJSON = json_encode($movie);
echo $movieJSON;
}
?>