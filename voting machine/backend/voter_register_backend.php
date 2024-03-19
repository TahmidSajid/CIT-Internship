<?php
session_start();
print_r($_POST);
$name = $_POST['name'];
$phone = $_POST['phone'];
$nid = $_POST['nid'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$voter_photo_info = $_FILES['photo']['full_path'];
$voter_photo_path = $_FILES['photo']['tmp_name'];
$voter_photo_extension = explode('.', $voter_photo_info)[1];
$voter_photo = rand(1, 10000) . "." . $voter_photo_extension;
move_uploaded_file($voter_photo_path,'../assets/uploads/voter_photos/'.$voter_photo);
require_once("../components/data_connect.php");
$voter_register = "INSERT INTO `voter`(`name`, `phone`, `photo`, `nid`, `gender`, `address`, `vote`, `role`) VALUES ('$name','$phone','$nid','$gender','$address','$voter_photo','1','voter')";
mysqli_query($data_connect,$voter_register);
$_SESSION['voter_register']='voter registered';
?>