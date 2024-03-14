<?php
    $id = $_POST['id'];
    $data_connect = mysqli_connect('localhost', 'root', '', 'to-do');
    $soft_query = "UPDATE `users` SET `delete_at`= 1 WHERE id ='$id'";
    mysqli_query($data_connect,$soft_query);
    header("Location:../index.php")
?>