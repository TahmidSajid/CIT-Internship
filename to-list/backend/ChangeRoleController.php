<?php
    print_r($_POST);
    $per_editor = $_POST['editor'];
    $per_user = $_POST['user'];
    $id = $_POST['id'];
    $data_connect = mysqli_connect('localhost', 'root', '', 'to-do');
    if (isset($per_editor)) {
        $editor_query = "UPDATE `users` SET `role`='editor' WHERE id ='$id'";
        mysqli_query($data_connect,$editor_query);
    }
    else{
        $editor_query = "UPDATE `users` SET `role`='user' WHERE id ='$id'";
        mysqli_query($data_connect,$editor_query);
    }
    header('Location:../index.php');
?>