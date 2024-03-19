<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('Location:login.php');
}
require_once('./components/index_header.php');
require('./components/data_connect.php');
$candidates_query = "SELECT * FROM `candidates`";
$candidates = mysqli_query($data_connect, $candidates_query);
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
        if (isset($_SESSION['candidate_delete'])) {
        ?>
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="alert alert-danger">
                        <?= $_SESSION['candidate_delete'] ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Candidate Information</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Candidate Name</th>
                                <th scope="col">Candidate Email</th>
                                <th scope="col">Candidate Phone</th>
                                <th scope="col">Candidate Photo</th>
                                <th scope="col">Candidate Icon</th>
                                <th scope="col">Candidate Icon Name</th>
                                <th scope="col">Electional Jilla</th>
                                <th scope="col">Total Vote</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($candidates as $key => $candidate) {
                            ?>
                                <tr>
                                    <td>
                                        <?= $key+1 ?>
                                    </td>
                                    <td>
                                        <?= $candidate['candidate_name'] ?>
                                    </td>
                                    <td>
                                        <?= $candidate['email'] ?>
                                    </td>
                                    <td>
                                        <?= $candidate['phone'] ?>
                                    </td>
                                    <td>
                                        <img style="height: 80px; width:80px;" class="rounded-circle" src="assets/uploads/candidate_photos/<?= $candidate['photo'] ?>" alt="">
                                    </td>
                                    <td>
                                    <img style="height: 80px; width:80px;" class="rounded-circle" src="assets/uploads/icons/<?= $candidate['icon'] ?>" alt="">       
                                    </td>
                                    <td>
                                        <?= $candidate['icon_name'] ?>
                                    </td>
                                    <td>
                                        <?= $candidate['jilla'] ?>
                                    </td>
                                    <td>
                                        <?= $candidate['vote'] ?>
                                    </td>
                                    <td>
                                        <a href="./backend/candidate_ban.php?id=<?= $candidate['id']?>">
                                            <i class="fa-solid fa-ban"></i>
                                        </a>
                                    </td>
                                </tr>
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
// session_unset();
unset($_SESSION['candidate_successful']);
unset($_SESSION['candidate_delete']);
?>