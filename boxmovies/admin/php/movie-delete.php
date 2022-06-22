<?php
require_once 'config.php';
$id = $_POST['id'];
if(isset($id)){
$sql_preview = "DELETE FROM PREVIEW WHERE MOVIE_ID=$id";
$query = mysqli_query(connection(), $sql_preview);
$sql_movie = "DELETE FROM MOVIE WHERE ID=$id";
$query = mysqli_query(connection(), $sql_movie);
}
mysqli_close(connection());
?>