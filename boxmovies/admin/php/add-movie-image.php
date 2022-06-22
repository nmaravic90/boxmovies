<?php
require_once 'config.php';
$img = $_FILES['file'];
if(isset($img)){
    $name       = $_FILES['file']['name'];  
    $temp_name  = $_FILES['file']['tmp_name'];  
    if(isset($name)){
        if(!empty($name)){      
            $location = '../../img/movies/';      
            move_uploaded_file($temp_name, $location.$name);
            echo $name;
        }       
    }  
}
?>


