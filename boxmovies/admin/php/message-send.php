<?php
$to = 'nidza.nbg@gmail.com'; // $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$from = "From: Boxmovies <office@boxmovies.com>";
mail($to,$subject,$message,$from);
?>