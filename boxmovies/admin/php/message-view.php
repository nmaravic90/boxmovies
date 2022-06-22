<?php
require_once 'config.php';
$id = $_POST['id'];
$sql = "SELECT TEXT FROM MESSAGE WHERE ID=$id";
$query = mysqli_query(connection(), $sql);
$row= mysqli_fetch_array($query);
$message = $row['TEXT'];
mysqli_close(connection());
echo $message;
?>