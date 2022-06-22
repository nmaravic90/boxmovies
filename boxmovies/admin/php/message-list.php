<?php
require_once 'config.php';
$value  = 8;
$index = $_POST['index']-1;
$str = $index * $value;
$sql = "SELECT * FROM MESSAGE ORDER BY ID LIMIT $str, $value";
$query = mysqli_query(connection(), $sql);
$message = array();
while ($row = mysqli_fetch_assoc($query)) {
    $message[]=$row;
}
$messageJSON = json_encode($message);
mysqli_close(connection());
echo $messageJSON;
?>
