<?php
require_once 'config.php';
$id = $_POST['id'];
if(isset($id)){
$sql = "DELETE FROM MESSAGE WHERE ID=$id";
$query = mysqli_query(connection(), $sql);
}
mysqli_close(connection());
?>