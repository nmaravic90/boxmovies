<?php
require_once 'config.php';
$sql = "SELECT COUNT(*) AS count FROM MESSAGE";
$query = mysqli_query(connection(), $sql);
$row = mysqli_fetch_assoc($query);
$inbox_count = $row['count'];
echo $inbox_count;
?>