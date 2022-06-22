<?php
require_once 'config.php';
$value  = 8;

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

$sql = "SELECT COUNT(*) AS count FROM MOVIE ";
if(isset($title) || isset($year) || isset($rating) || isset($genre)) {
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
}

$query = mysqli_query(connection(), $sql);
$row = mysqli_fetch_assoc($query);
$movie_count = $row['count'];
mysqli_close(connection());
echo ceil($movie_count/$value);
?>