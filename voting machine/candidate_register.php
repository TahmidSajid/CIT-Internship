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
                <h4 class="card-title">Form Validation</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="./backend/candidate_register_backend.php" method="post">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Username
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Your valid email..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-phoneus">Phone (BAN)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-phoneus" name="val-phoneus" placeholder="212-999-0000">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">photo<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="val-digits" name="val-digits" placeholder="5">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">Icon<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="val-digits" name="val-digits" placeholder="5">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">Icon name<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-digits" name="val-digits" placeholder="5">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
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
// session_unset();
?>