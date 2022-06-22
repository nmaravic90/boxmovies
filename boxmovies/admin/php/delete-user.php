<?php
require_once 'config.php';
$id = $_POST['index'];
if(isset($id)){
$sql = "DELETE FROM USER WHERE ID=$id";
$query = mysqli_query(connection(), $sql);
}
mysqli_close(connection());
?>