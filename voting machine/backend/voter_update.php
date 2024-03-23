<?php
print_r($_FILES);
$name = $_POST['name'];
$id = $_POST['id'];
$phone = $_POST['phone'];
$nid = $_POST['nid'];
$address = $_POST['address'];
$gender = $_POST['gender'];
echo $voter_photo_info = $_FILES['photo']['full_path'];
echo $voter_photo_path = $_FILES['photo']['tmp_name'];
echo $voter_photo_extension = explode('.', $voter_photo_info)[1];
echo $voter_photo = rand(1, 10000) . "." . $voter_photo_extension;
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
if ($flag) {
    header('Location:../voter_list.php');
} else {
        if($voter_photo_info != null){
            move_uploaded_file($voter_photo_path, '../assets/uploads/voter_photos/'.$voter_photo);
            $voter_update_photo ="UPDATE `voter` SET `name`='$name',`phone`='$phone',`photo`='$voter_photo',`nid`='$nid',`gender`='$gender',`address`='$address' WHERE id='$id'";
            mysqli_query($data_connect, $voter_update_photo);
        }
        else{
            $voter_update = "UPDATE `voter` SET `name`='$name',`phone`='$phone',`nid`='$nid',`gender`='$gender',`address`='$address' WHERE id='$id'";
            mysqli_query($data_connect, $voter_update);
        }
        header('Location: ../voter_list.php');
}
