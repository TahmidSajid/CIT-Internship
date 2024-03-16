<?php
session_start();
$flag = false;
$email = $_POST['email'];
$password = $_POST['password'];
require('../components/data_connect.php');
if(!$email){
    $flag = true;
    $_SESSION['email_error'] = 'email required';
}
if(!$password){
    $flag = true;
    $_SESSION['password_error'] = 'password required';
}

if($flag){
    header('Location:../login.php');
}
$password = md5($password);
$check_query = "SELECT COUNT(*) per FROM `commissioner` WHERE email='$email' AND password ='$password'";
$check_result = mysqli_fetch_assoc(mysqli_query($data_connect,$check_query))['per'];
if($check_result !== 0){
    header('Location:../index.php');
    $admin_info_query = "SELECT * FROM `commissioner` WHERE email='$email' AND password ='$password'";
    $admin_info = mysqli_fetch_assoc(mysqli_query($data_connect,$admin_info_query));
    $_SESSION['name'] = $admin_info['name'];
    $_SESSION['email'] = $admin_info['email'];
    $_SESSION['photo'] = $admin_info['photo'];
    $_SESSION['role'] = $admin_info['role'];
}
else{
    header('Location:../login.php');
    $_SESSION['login_error'] = 'credential does not match';
}

?>