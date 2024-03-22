<?php
session_start();
require('../components/data_connect.php');
print_r($_GET);
$id = $_GET['id'];
$voter_user = "DELETE FROM `voter` WHERE id='$id'";
mysqli_query($data_connect,$voter_user);
$_SESSION['voter_deleted'] = 'Voter Deleted Successful';
header('Location: ../voter_list.php');


?>