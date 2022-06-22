<?php
require_once 'config.php';
$value  = 8;
$sql = "SELECT COUNT(*) as count FROM MESSAGE";
$query = mysqli_query(connection(), $sql);
$row = mysqli_fetch_assoc($query);
$message_count = $row['count'];
echo ceil($message_count/$value);
?>