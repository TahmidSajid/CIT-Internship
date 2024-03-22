<?php
session_start();
// print_r($_POST);
$name = $_POST['name'];
$phone = $_POST['phone'];
$nid = $_POST['nid'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$voter_photo_info = $_FILES['photo']['full_path'];
$voter_photo_path = $_FILES['photo']['tmp_name'];
$voter_photo_extension = explode('.', $voter_photo_info)[1];
$voter_photo = rand(1, 10000) . "." . $voter_photo_extension;
$flag = false;
require_once("../components/data_connect.php");

if (!$name) {
    $flag = true;
    $_SESSION['name_error'] = 'name required';
}
if (!$phone) {
    $flag = true;
    $_SESSION['phone_error'] = 'phone required';
}
if (!$nid) {
    $flag = true;
    $_SESSION['nid_error'] = 'nid required';
}
if (!$address) {
    $flag = true;
    $_SESSION['address_error'] = 'address required';
}
if (!$gender) {
    $flag = true;
    $_SESSION['gender_error'] = 'gender required';
}
if (!$voter_photo_info) {
    $flag = true;
    $_SESSION['voter_photo_error'] = 'voter photo required';
}
if ($flag) {
    header('Location:../voter_register.php');
} else {
    $num_query = "SELECT COUNT(*) AS number_per FROM `voter` WHERE phone = '$phone'";
    $num_check = mysqli_fetch_assoc(mysqli_query($data_connect,$num_query))['number_per'];
    if ($num_check == 0) {
        move_uploaded_file($voter_photo_path, '../assets/uploads/voter_photos/' . $voter_photo);
        $voter_register = "INSERT INTO `voter`(`name`, `phone`, `photo`, `nid`, `gender`, `address`, `vote`, `role`) VALUES ('$name','$phone','$voter_photo','$nid','$gender','$address','1','voter')";
        mysqli_query($data_connect, $voter_register);
        $voter_query = "SELECT * FROM `voter` where nid='$nid'";
        $voter_info = mysqli_fetch_assoc(mysqli_query($data_connect,$voter_query));
        print_r($voter_info);
        $_SESSION['voter_id'] = $voter_info['id'];
        $_SESSION['voter_name'] = $voter_info['name'];
        $_SESSION['voter_photo'] = $voter_info['photo'];
        $_SESSION['voter_nid'] =  $voter_info['nid'];        
        $_SESSION['voter_gender'] =  $voter_info['gender'];
        $_SESSION['voter_role'] = $voter_info['role'];
        header('Location: ../voter_index.php');
    }
    else{
        $_SESSION['num_exist'] = 'phone number already exist';
        header('Location:../voter_register.php');
    }
}
