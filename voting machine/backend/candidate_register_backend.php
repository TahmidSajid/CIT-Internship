<?php
session_start();
print_r($_POST);
require_once('../components/data_connect.php');
$candidate_name = $_POST['candidate_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$photo = $_FILES['candidate_photo']['tmp_name'];
$icons = $_FILES['icons']['tmp_name'];
$icon_name = $_POST['icon_name'];
$jilla_name = $_POST['jilla_name'];
$vote = 0;


$candidate_photo_info = $_FILES['candidate_photo']['full_path'];
$candidate_photo_path = $_FILES['candidate_photo']['tmp_name'];
$candidate_photo_extension = explode('.', $candidate_photo_info)[1];
$candidate_photo = rand(1, 10000) . "." . $candidate_photo_extension;
move_uploaded_file($candidate_photo_path,'../assets/uploads/candidate_photos/'.$candidate_photo);


$candidate_icon_info = $_FILES['icons']['full_path'];
$candidate_icon_path = $_FILES['icons']['tmp_name'];
$candidate_icon_extension = explode('.', $candidate_icon_info)[1];
$icons = rand(1, 10000) . "." . $candidate_icon_extension;
move_uploaded_file($candidate_icon_path,'../assets/uploads/icons/'.$icons);

if (!$candidate_name) {
    $flag = true;
    $_SESSION['name_error'] = 'name required';
}
if (!$email) {
    $flag = true;
    $_SESSION['email_error'] = 'email required';
}
if (!$phone) {
    $flag = true;
    $_SESSION['phone'] = 'phone required';
}
if (!$photo) {
    $flag = true;
    $_SESSION['photo_error'] = 'photo required';
}
if (!$icons) {
    $flag = true;
    $_SESSION['icon_error'] = 'icon required';
}
if (!$icon_name) {
    $flag = true;
    $_SESSION['icon_name_error'] = 'icon name required';
}
if (!$jilla_name) {
    $flag = true;
    $_SESSION['jilla_name_error'] = 'jilla name required';
}
if ($flag) {
    header('Location:../candidate_register.php');
} else {
    $candidate_insert = "INSERT INTO `candidates`(`candidate_name`, `email`, `phone`, `photo`, `icon`, `icon_name`, `jilla`, `vote`) VALUES ('$candidate_name','$email','$phone','$candidate_photo','$icons','$icon_name','$jilla_name','$vote')";
    mysqli_query($data_connect, $candidate_insert);
    $_SESSION['candidate_successful'] = 'candidate created successfully';
    header('Location:../candidate_list.php');
}
