<?php
require_once 'config.php';
$sql = "SELECT COUNT(*) AS count FROM USER";
$query = mysqli_query(connection(), $sql);
$row = mysqli_fetch_assoc($query);
$user_count = $row['count'];
mysqli_close(connection());
echo $user_count;
?>