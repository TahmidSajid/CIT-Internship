<?php
require('./../components/data_connect.php');
print_r($_GET);
$id = $_GET['id'];
$candidate_dalete = "DELETE FROM `candidates` WHERE id='$id'";
mysqli_query($data_connect,$candidate_dalete);
$_SESSION['candidate_delete'] = 'candidate deleted';
header('Location:./../candidate_list.php');
?>