<?php
session_start();
require('../components/data_connect.php');
$id = $_GET['id'];
$candidate_id = $_GET['candidate_id'];

$update_vote = "UPDATE `voter` SET `vote`= 0 WHERE id='$id'"; 
mysqli_query($data_connect,$update_vote);


$vote_query = "SELECT * FROM `candidates` WHERE id='$candidate_id'";
$get_vote = mysqli_fetch_assoc(mysqli_query($data_connect,$vote_query))['vote'];

$total_vote = $get_vote + 1;

$cast_vote = "UPDATE `candidates` SET `vote`= '$total_vote' WHERE id='$candidate_id'"; 
mysqli_query($data_connect,$cast_vote);

$_SESSION['vote_done'] = 'voting done';

header('Location: ../voter_index.php');

?>