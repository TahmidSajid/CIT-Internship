<?php
session_start();
if(isset($_SESSION['voter_name'])){
    header('Location:voter_index.php');
}
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
                                        <input type="name" class="form-control" name="name">
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
                                        <input type="phone" class="form-control" name="phone">
                                        <?php
                                        if (isset($_SESSION['phone_error'])) {
                                        ?>
                                            <div class="text-danger">
                                                <?= $_SESSION['phone_error'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>NID number</strong></label>
                                        <input type="number" class="form-control" name="nid">
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
                                        <input type="text" class="form-control" name="address">
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
                                        <label class="radio-inline mr-3"><input type="radio" name="gender" value="male"> Male</label>
                                        <label class="radio-inline mr-3"><input type="radio" name="gender" value="Female"> Female</label>
                                        <label class="radio-inline mr-3"><input type="radio" name="gender" value="Others"> Others</label>
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
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p class="text-white">Don't have an account? <a class="text-white" href="./voter_register.php">Sign up for voter</a></p>
                                </div>
                                <div class="new-account mt-3">
                                    <p class="text-white">Don't have an account? <a class="text-info" href="./voter_login.php">Sign in as Voter</a></p>
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
unset($_SESSION['phone_error']);
unset($_SESSION['nid_error']);
unset($_SESSION['address_error']);
unset($_SESSION['gender_error']);
unset($_SESSION['voter_photo_error']);
?>