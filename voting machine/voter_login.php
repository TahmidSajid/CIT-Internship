<?php
session_start();
if (isset($_SESSION['voter_name'])) {
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
                                    <a href="index.html"><img src="assets/images/logo-full.png" alt=""></a>
                                </div>
                                <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                <form action="./backend/voter_login.php" method="POST">
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Name</strong></label>
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
                                        <label class="mb-1 text-white"><strong>Phone</strong></label>
                                        <input type="text" class="form-control" name="phone">
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
                                    <?php
                                    if (isset($_SESSION['credi_error'])) {
                                    ?>
                                        <div class="text-danger">
                                            <?= $_SESSION['credi_error'] ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox ml-1 text-white">
                                                <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                                <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a class="text-white" href="page-forgot-password.html">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p class="text-white">Don't have an account? <a class="text-info" href="./voter_register.php">Sign up for voter</a></p>
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
?>