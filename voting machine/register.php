<?php
session_start();
if(isset($_SESSION['name'])){
    header('Location:index.php');
}
include_once('components/header.php');
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
                                <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                                <form action="./backend/commissionar-register.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Username</strong></label>
                                        <input type="text" class="form-control" placeholder="username" name="name">
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
                                        <label class="mb-1 text-white"><strong>Email</strong></label>
                                        <input type="email" class="form-control" placeholder="hello@example.com" name="email">
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
                                        <label class="mb-1 text-white"><strong>Photo</strong></label>
                                        <input type="file" class="form-control" placeholder="hello@example.com" name="photo">
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
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Password</strong></label>
                                        <input type="password" class="form-control" name="password">
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
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p class="text-white">Already have an account? <a class="text-white" href="./login.php">Sign in</a></p>
                                </div>
                                <?php
                                if (isset($_SESSION['admin_created'])) {
                                ?>
                                    <div class="text-danger">
                                        <?= $_SESSION['admin_created'] ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['admin_exist'])) {
                                ?>
                                    <div class="text-danger">
                                        <?= $_SESSION['admin_exist'] ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('components/footer.php');
unset($_SESSION['name_error']);
unset($_SESSION['email_error']);
unset($_SESSION['photo_error']);
unset($_SESSION['password_error']);
?>