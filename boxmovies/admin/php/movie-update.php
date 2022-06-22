<?php
include 'config.php';
$id = $_POST['id'];
$title = $_POST['title'];
$year = $_POST['year'];
$rating = $_POST['rating'];
$genre = $_POST['genre'];
$img = $_POST['img'];  
$url = $_POST['url'];
$description = $_POST['description'];

if(isset($id) && isset($title) && isset($year) && isset($rating) && isset($img) && isset($url)  && isset($description) ){
    $sqlMovie = "UPDATE MOVIE SET TITLE='$title', YEAR ='$year', RATING = $rating, GENRE='$genre', IMG='$img' WHERE ID = $id";
    
    if(mysqli_query(connection(), $sqlMovie)){


  $sqlMovieUrl = "UPDATE MOVIE_URL SET URL = '$url', DESCRIPTION = '$description' WHERE MOVIE_ID = $id";
//    echo $sqlMovieUrl;
    if(mysqli_query(connection(),$sqlMovieUrl)){
        echo 'Successfully inserted data!';
    }
}
    mysqli_close(connection());
}
?>