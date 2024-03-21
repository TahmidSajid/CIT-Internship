<?php
session_start();
require_once('./components/index_header.php');
require('./components/data_connect.php');
$candidates_query = "SELECT * FROM `candidates`";
$candidates = mysqli_query($data_connect, $candidates_query);
$voter_id = $_SESSION['voter_id'];
$vote_query = "SELECT * FROM `voter` WHERE id='$voter_id'";
$get_vote = mysqli_fetch_assoc(mysqli_query($data_connect, $vote_query))['vote'];
?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="card overflow-hidden">
                    <div class="text-center p-3 overlay-box " style="background-image: url(images/big/img1.jpg);">
                        <div class="profile-photo">
                            <img src="assets/uploads/voter_photos/<?= $_SESSION['voter_photo'] ?>" width="100" class="img-fluid rounded-circle" alt="">
                        </div>
                        <h3 class="mt-3 mb-1 text-white"><?= $_SESSION['voter_name'] ?></h3>
                        <p class="text-white mb-0"><?= $_SESSION['voter_role'] ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Gender</span> <strong class="text-muted"><?= $_SESSION['voter_gender'] ?> </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0">NID no</span> <strong class="text-muted"><?= $_SESSION['voter_nid'] ?> </strong></li>
                    </ul>
                    <!-- <div class="card-footer border-0 mt-0">
                        <button class="btn btn-primary btn-lg btn-block">
                            <i class="fa fa-bell-o"></i> Reminder Alarm
                        </button>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-9">
                <?php
                if ($get_vote != 0) {
                ?>
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <?php
                                foreach ($candidates as $key => $candidate) {
                                ?>
                                    <div class="col-lg-4">
                                        <div class="card overflow-hidden">
                                            <div class="text-center p-5 overlay-box" style="background-image: url(images/big/img5.jpg);">
                                                <img src="assets/uploads/icons/<?= $candidate['icon'] ?>" width="100" class="img-fluid rounded-circle" alt="">
                                                <h3 class="mt-3 mb-0 text-white"><?= $candidate['icon_name'] ?></h3>
                                                <h6 class="mt-3 mb-0 text-white"><?= $candidate['candidate_name'] ?></h6>
                                            </div>
                                            <div class="card-footer mt-0">
                                                <a class="btn btn-primary btn-lg btn-block" href="./backend/vote_cast.php?id=<?= $_SESSION['voter_id'] ?>&candidate_id=<?= $candidate['id'] ?>">Vote</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <h2 class="text-center">Your voting is done</h2>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>













<?php
require_once('./components/index_footer.php');
?>