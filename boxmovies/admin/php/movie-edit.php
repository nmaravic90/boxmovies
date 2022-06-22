<?php
include 'config.php';
$movie = array();
$id = $_POST['id'];

if(isset($id)){
$sqlMovie = "SELECT * FROM MOVIE WHERE ID=$id";
$queryMovie = mysqli_query(connection(), $sqlMovie);

while ($row = mysqli_fetch_assoc($queryMovie)) {
    // $movie[]=$row;
    array_push($movie, $row);
}

$sqlMovieUrl = "SELECT url, description FROM MOVIE_URL WHERE MOVIE_ID=$id";
$queryMovieUrl = mysqli_query(connection(), $sqlMovieUrl);

while ($row = mysqli_fetch_assoc($queryMovieUrl)) {
    array_push($movie, $row);
}


// }


$movieJSON = json_encode($movie);
echo $movieJSON;
}
mysqli_close(connection());

?>