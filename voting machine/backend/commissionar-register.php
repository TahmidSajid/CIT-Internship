<?php

session_start();

$flag = false;
require ('../components/data_connect.php');
$name = $_POST['name'];
$emali = $_POST['email'];
$password = md5($_POST['password']);
$photo_info = $_FILES['photo']['full_path'];
$photo_path = $_FILES['photo']['tmp_name'];
$photo_extension = explode('.',$photo_info)[1];
$new_name = rand(1,10000).".".$photo_extension;
if(!$name){
    $flag = true;
    $_SESSION['name_error'] = 'name required';
}
if(!$emali){
    $flag = true;
    $_SESSION['email_error'] = 'email required';

}
if(!$_POST['password']){
    $flag = true;
    $_SESSION['password_error'] = 'password required';
}
if(!$photo_info){
    $flag = true;
    $_SESSION['photo_error'] = 'photo required';
}
if($flag){
    header('Location:../register.php');
}
else{
    $admin_per_query = "SELECT COUNT(*) AS per FROM `commissioner` WHERE role='admin';";
    $admin_per_check = mysqli_query($data_connect,$admin_per_query);
    $admin_per_result = mysqli_fetch_assoc($admin_per_check)['per'];

    if($admin_per_result == 0){
        move_uploaded_file($photo_path,'../assets/uploads/profile_photos/'.$new_name);
        $data_insert = "INSERT INTO `commissioner`(`name`, `email`, `password`, `photo`,`role`) VALUES ('$name','$emali','$password','$new_name','admin')";
        mysqli_query($data_connect,$data_insert);
        $_SESSION['admin_created'] = 'commissionar created';
    }
    else{
        $_SESSION['admin_exist'] = 'commissionar already exist';

    }
    header('Location:../register.php');
}

















?>