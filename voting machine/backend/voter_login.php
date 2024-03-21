<?php
session_start();
print_r($_POST);
require_once('../components/data_connect.php');
$name = $_POST['name'];
$phone = $_POST['phone'];
$flag = false;

if (!$name) {
    $flag = true;
    $_SESSION['name_error'] = 'name required';
}
if (!$phone) {
    $flag = true;
    $_SESSION['phone_error'] = 'phone required';
}

if ($flag == false) {
    $credi_query = "SELECT COUNT(*) AS per FROM `voter` WHERE name='$name' AND phone = '$phone';";
    $credi_check =  mysqli_fetch_assoc(mysqli_query($data_connect, $credi_query))['per'];
    if ($credi_check == 1) {
        $voter_query = "SELECT * FROM `voter` WHERE phone = '$phone';";
        $voter_info =  mysqli_fetch_assoc(mysqli_query($data_connect, $voter_query));
        $_SESSION['voter_id'] = $voter_info['id'];
        $_SESSION['voter_name'] = $voter_info['name'];
        $_SESSION['voter_photo'] = $voter_info['photo'];
        $_SESSION['voter_nid'] =  $voter_info['nid'];
        $_SESSION['voter_gender'] =  $voter_info['gender'];
        $_SESSION['voter_role'] = $voter_info['role'];
        header('Location:../voter_index.php');
    }
    else{
        $_SESSION['credi_error'] = "credential doesn't match";
    }
}
else{
    header('Location:../voter_login.php');

}




?>