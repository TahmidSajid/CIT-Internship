<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$data_check = "SELECT COUNT(*) AS result FROM `users` WHERE email='$email' AND password='$password' AND role='admin'";
$data_connect = mysqli_connect('localhost', 'root', '', 'to-do');

$login_check = mysqli_query($data_connect, $data_check);


$result = mysqli_fetch_assoc($login_check)['result'];

if ($result == 1) {
    $data_get = "SELECT * FROM `users` WHERE email='$email' AND password='$password' AND role='admin'";
    
    $login_data = mysqli_query($data_connect, $data_get);
    $login_info = mysqli_fetch_assoc($login_data);
    $_SESSION['user_name'] = $login_info['name'];
    $_SESSION['role'] = $login_info['role'];
    header('Location: ../index.php',$_SESSION['user_name']);
}
else{
    header('Location: ../login.php',$_SESSION['failed']);
}
