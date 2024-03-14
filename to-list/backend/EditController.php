<?php
print_r($_POST);
$name = $_POST['name'];
$email = $_POST['email'];
$id = $_POST['id'];
$data_connect = mysqli_connect('localhost', 'root', '', 'to-do');
$update_query = "UPDATE `users` SET `name`='$name',`email`='$email' WHERE id='$id'";
mysqli_query($data_connect,$update_query);
header('Location:../index.php')
?>