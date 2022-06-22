<?php
require_once 'config.php';
$rowName = $_POST['rowName'];
$rowValue = $_POST['rowValue'];
if(isset($rowName) && isset($rowValue)){
$sql = "SELECT * FROM USER WHERE $rowName LIKE '%$rowValue%'";
$query = mysqli_query(connection(), $sql);
$user = array();
while ($row = mysqli_fetch_array($query)) {
    $user[]=$row;
}
mysqli_close(connection());
$userJSON = json_encode($user);
echo $userJSON;
}
?>