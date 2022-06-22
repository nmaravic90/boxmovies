<?php 
require_once 'config.php';
$movie = array();
$id = $_POST['id'];

if(isset($id)){
    $sqlMovie = "SELECT * FROM MOVIE WHERE ID=$id";
    $queryMovie = mysqli_query(connection(), $sqlMovie);
    
    while ($row = mysqli_fetch_assoc($queryMovie)) {
        array_push($movie, $row);
    }
    
    $sqlMovieUrl = "SELECT url, description FROM MOVIE_URL WHERE MOVIE_ID=$id";
    $queryMovieUrl = mysqli_query(connection(), $sqlMovieUrl);
    
    while ($row = mysqli_fetch_assoc($queryMovieUrl)) {
        array_push($movie, $row);
    }
    
mysqli_close(connection());
$movieJSON = json_encode($movie);
echo $movieJSON;
}
?>