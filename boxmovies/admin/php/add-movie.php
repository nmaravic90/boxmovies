<?php
include 'config.php';
$title = $_POST['title'];
$year = $_POST['year'];
$rating = $_POST['rating'];
$genre = $_POST['genre'];
$image = $_FILES['file']['name'];  
$url = $_POST['url'];
$description = $_POST['description'];
if(isset($title) && isset($year) && isset($rating) && isset($image) && isset($url)  && isset($description) ){
    $sqlMovie = "INSERT INTO MOVIE VALUES (DEFAULT,'$title','$year','$rating','$genre', '$image')";

    if(mysqli_query(connection(),$sqlMovie)){

        $sqlLastId = "SELECT MAX(ID) as movie_id FROM MOVIE";
        $query = mysqli_query(connection(),$sqlLastId);

        if($query){

        $row = mysqli_fetch_assoc($query);
        $lastId = $row['movie_id'];

    $sqlMovieUrl = "INSERT INTO MOVIE_URL VALUES (DEFAULT, $lastId,'$url','$description')";
    if(mysqli_query(connection(),$sqlMovieUrl)){
        echo 'Successfully inserted data!';
    }
}
}
    mysqli_close(connection());
}
?>