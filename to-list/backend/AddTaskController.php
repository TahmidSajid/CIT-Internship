<?php
print_r($_POST);

$task_name = $_POST['task_name'];
$task_time = $_POST['task_time'];
$task_detail = $_POST['task_detail'];

$data_add = "INSERT INTO `tasks`(`task_name`, `task_details`, `task_time`) VALUES ('$task_name','$task_detail','$task_time')";
$data_connect = mysqli_connect('localhost', 'root', '', 'to-do');
mysqli_query($data_connect,$data_add);
?>