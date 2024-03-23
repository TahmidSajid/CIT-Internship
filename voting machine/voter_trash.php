<?php
session_start();
require_once('./components/index_header.php');
require('./components/data_connect.php');
$voter_query = "SELECT * FROM `voter`";
$voters = mysqli_query($data_connect, $voter_query);
?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <?php
        if (isset($_SESSION['candidate_successful'])) {
        ?>
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="alert alert-success">
                        <?= $_SESSION['candidate_successful'] ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION['voter_deleted'])) {
        ?>
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="alert alert-danger">
                        <?= $_SESSION['voter_deleted'] ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Voter trash List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Voter Photo</th>
                                <th scope="col">Voter Name</th>
                                <th scope="col">NID Number</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Vote Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($voters as $key => $voter) {
                            ?>
                                <?php
                                if ($voter['deleted'] == true) {
                                ?>
                                    <tr>
                                        <td>
                                            <?= $key + 1 ?>
                                        </td>
                                        <td>
                                            <img style="height: 80px; width:80px;" class="rounded-circle" src="assets/uploads/voter_photos/<?= $voter['photo'] ?>" alt="">
                                        </td>
                                        <td>
                                            <?= $voter['name'] ?>
                                        </td>
                                        <td>
                                            <?= $voter['nid'] ?>
                                        </td>
                                        <td>
                                            <?= $voter['gender'] ?>
                                        </td>

                                        <td>
                                            <?= $voter['address'] ?>
                                        </td>
                                        <td>
                                            <?= $voter['phone'] ?>
                                        </td>
                                        <td>
                                            <?php if ($voter['vote'] == 0) { ?>
                                                <div class="badge light badge-success">
                                                    Done
                                                </div>
                                            <?php
                                            } else { ?>
                                                <div class="badge light badge-danger">
                                                    Remaining
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <a href="./backend/voter_delete.php?id=<?= $voter['id'] ?>">
                                                        <i class="fa-solid fa-ban"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>












<?php
require_once('./components/index_footer.php');
unset($_SESSION['voter_deleted']);
?>