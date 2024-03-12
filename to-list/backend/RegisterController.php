<?php
session_start();
// print_r($_POST);
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$_SESSION['admin_created'] = 'successfull';

$insert_query = "INSERT INTO `users`(`name`, `email`, `password`,`role`) VALUES ('$name','$email','$password','admin')";

$table_connect = mysqli_connect('localhost','root','','to-do');

$table_query = mysqli_query($table_connect,$insert_query);

header("Location:../login.php", $_SESSION['admin_created'])

?>