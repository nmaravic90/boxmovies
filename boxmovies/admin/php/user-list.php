<?php
require_once 'config.php';
$sql = "SELECT * FROM USER ORDER BY ID";
$query = mysqli_query(connection(), $sql);
$user = array();
while ($row = mysqli_fetch_array($query)) {
    $user[]=$row;
}
mysqli_close(connection());
$userJSON = json_encode($user);
echo $userJSON;
?>