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
                <h4 class="card-title">Voter List</h4>
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
                                if ($voter['deleted'] != true) {
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
                                                    <a href="./backend/voter_soft_delete.php?id=<?= $voter['id'] ?>">
                                                        <i class="fa-solid fa-ban"></i>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6">
                                                    <button type="button" style="background-color:transparent !important; border:0px !important;" data-toggle="modal" data-target="#bd-example-modal-lg<?= $key ?>">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </button>
                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="bd-example-modal-lg<?= $key ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="./backend/voter_update.php" method="POST" enctype="multipart/form-data">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" readonly name="id" value="<?= $voter['id'] ?>">
                                                                            <label class="mb-1 text-white"><strong>name</strong></label>
                                                                            <input type="name" class="form-control" name="name" value="<?= $voter['name'] ?>">
                                                                            <?php
                                                                            if (isset($_SESSION['name_error'])) {
                                                                            ?>
                                                                                <div class="text-danger">
                                                                                    <?= $_SESSION['name_error'] ?>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="mb-1 text-white"><strong>phone number</strong></label>
                                                                            <input type="phone" class="form-control" name="phone" value="<?= $voter['phone'] ?>">
                                                                            <?php
                                                                            if (isset($_SESSION['phone_error'])) {
                                                                            ?>
                                                                                <div class="text-danger">
                                                                                    <?= $_SESSION['phone_error'] ?>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <?php
                                                                            if (isset($_SESSION['num_exist'])) {
                                                                            ?>
                                                                                <div class="text-danger">
                                                                                    <?= $_SESSION['num_exist'] ?>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="mb-1 text-white"><strong>NID number</strong></label>
                                                                            <input type="number" class="form-control" name="nid" value="<?= $voter['nid'] ?>">
                                                                            <?php
                                                                            if (isset($_SESSION['nid_error'])) {
                                                                            ?>
                                                                                <div class="text-danger">
                                                                                    <?= $_SESSION['nid_error'] ?>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="mb-1 text-white"><strong>Address</strong></label>
                                                                            <input type="text" class="form-control" name="address" value="<?= $voter['address'] ?>">
                                                                            <?php
                                                                            if (isset($_SESSION['address_error'])) {
                                                                            ?>
                                                                                <div class="text-danger">
                                                                                    <?= $_SESSION['address_error'] ?>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="mb-1 text-white"><strong>Photo</strong></label>
                                                                            <input type="file" class="form-control" name="photo">
                                                                            <?php
                                                                            if (isset($_SESSION['voter_photo_error'])) {
                                                                            ?>
                                                                                <div class="text-danger">
                                                                                    <?= $_SESSION['voter_photo_error'] ?>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>

                                                                        <div class="form-group mb-0">
                                                                            <label class="radio-inline mr-3"><input type="radio" name="gender" <?php if ($voter['gender'] == "male") { ?> checked <?php } ?> value="male"> Male</label>
                                                                            <label class="radio-inline mr-3"><input type="radio" name="gender" <?php if ($voter['gender'] == "Female") { ?> checked <?php } ?> value="Female"> Female</label>
                                                                            <label class="radio-inline mr-3"><input type="radio" name="gender" <?php if ($voter['gender'] == "Others") { ?> checked <?php } ?> value="Others"> Others</label>
                                                                            <?php
                                                                            if (isset($_SESSION['gender_error'])) {
                                                                            ?>
                                                                                <div class="text-danger">
                                                                                    <?= $_SESSION['gender_error'] ?>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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