<?php
session_start();

$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

$data_add = "INSERT INTO `users`(`name`, `email`, `password`,`role`) VALUES ('$user_name','$user_email','$user_password','user')";
$data_connect = mysqli_connect('localhost', 'root', '', 'to-do');
mysqli_query($data_connect,$data_add);

$_SESSION['user_add'] = 'user added successfully';

header("Location:../index.php");
?>