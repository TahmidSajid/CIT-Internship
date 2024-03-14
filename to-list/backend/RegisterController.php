<?php
session_start();
// print_r($_POST);
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$table_connect = mysqli_connect('localhost','root','','to-do');


$per_query = "SELECT COUNT(*) AS per FROM `users` WHERE role='admin'";


$per_check = mysqli_query($table_connect,$per_query);

if (mysqli_fetch_assoc($per_check)['per'] == 0) {
    $insert_query = "INSERT INTO `users`(`name`, `email`, `password`,`role`) VALUES ('$name','$email','$password','admin')";
    $table_query = mysqli_query($table_connect,$insert_query);
    $_SESSION['admin_created'] = 'successfull';
    header("Location:../login.php");
}
else{
    $_SESSION['admin_exist'] = 'admin already exist';
    header("Location:../register.php");
}


?>