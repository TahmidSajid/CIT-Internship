<?php
    $id = $_POST['id'];
    $data_connect = mysqli_connect('localhost', 'root', '', 'to-do');
    $delete_query = "DELETE FROM `users` WHERE id ='$id'";
    mysqli_query($data_connect,$delete_query);
    header("Location:../trash.php");
?>