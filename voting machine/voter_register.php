<?php
session_start();
require_once('./components/header.php');
?>
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href=""><img src="assets/images/logo-full.png" alt=""></a>
                                </div>
                                <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                <form action="./backend/voter_register_backend.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>name</strong></label>
                                        <input type="email" class="form-control" name="name">
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
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>phone number</strong></label>
                                        <input type="phone" class="form-control" name="phone">
                                        <?php
                                        if (isset($_SESSION['password_error'])) {
                                        ?>
                                            <div class="text-danger">
                                                <?= $_SESSION['password_error'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>NID number</strong></label>
                                        <input type="text" class="form-control" name="nid">
                                        <?php
                                        if (isset($_SESSION['password_error'])) {
                                        ?>
                                            <div class="text-danger">
                                                <?= $_SESSION['password_error'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Address</strong></label>
                                        <input type="text" class="form-control" name="address">
                                        <?php
                                        if (isset($_SESSION['password_error'])) {
                                        ?>
                                            <div class="text-danger">
                                                <?= $_SESSION['password_error'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Photo</strong></label>
                                        <input type="file" class="form-control" name="photo">
                                        <?php
                                        if (isset($_SESSION['password_error'])) {
                                        ?>
                                            <div class="text-danger">
                                                <?= $_SESSION['password_error'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="radio-inline mr-3"><input type="radio" name="gender" value="male"> Male</label>
                                        <label class="radio-inline mr-3"><input type="radio" name="gender" value="Female"> Female</label>
                                        <label class="radio-inline mr-3"><input type="radio" name="gender" value="Others"> Others</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p class="text-white">Don't have an account? <a class="text-white" href="./voter_register.php">Sign up for voter</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
require_once('./components/footer.php');
unset($_SESSION['name_error']);
unset($_SESSION['email_error']);
unset($_SESSION['phone']);
unset($_SESSION['photo_error']);
unset($_SESSION['icon_error']);
unset($_SESSION['icon_name_error']);
unset($_SESSION['candidate_successful']);
?>