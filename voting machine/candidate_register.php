<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('Location:login.php');
}
require_once('./components/index_header.php');
?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Candidates</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="./backend/candidate_register_backend.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Candidate name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="candidate_name" placeholder="Enter a candidate name..">
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
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-email" name="email" placeholder="Your valid email..">
                                        <?php
                                        if (isset($_SESSION['email_error'])) {
                                        ?>
                                            <div class="text-danger">
                                                <?= $_SESSION['email_error'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-phoneus">Phone (BAN)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-phoneus" name="phone" placeholder="212-999-0000">
                                        <?php
                                        if (isset($_SESSION['phone'])) {
                                        ?>
                                            <div class="text-danger">
                                                <?= $_SESSION['phone'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">photo<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="val-digits" name="candidate_photo" placeholder="5">
                                        <?php
                                        if (isset($_SESSION['photo_error'])) {
                                        ?>
                                            <div class="text-danger">
                                                <?= $_SESSION['photo_error'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">Icon<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="val-digits" name="icons" placeholder="5">
                                        <?php
                                        if (isset($_SESSION['icon_error'])) {
                                        ?>
                                            <div class="text-danger">
                                                <?= $_SESSION['icon_error'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">Icon name<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-digits" name="icon_name">
                                        <?php
                                        if (isset($_SESSION['icon_name_error'])) {
                                        ?>
                                            <div class="text-danger">
                                                <?= $_SESSION['icon_name_error'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">Jilla<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-digits" name="jilla_name">
                                        <?php
                                        if (isset($_SESSION['jilla_name_error'])) {
                                        ?>
                                            <div class="text-danger">
                                                <?= $_SESSION['jilla_name_error'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 mx-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
require_once('./components/index_footer.php');
unset($_SESSION['name_error']);
unset($_SESSION['email_error']);
unset($_SESSION['phone']);
unset($_SESSION['photo_error']);
unset($_SESSION['icon_error']);
unset($_SESSION['icon_name_error']);
unset($_SESSION['candidate_successful']);
?>