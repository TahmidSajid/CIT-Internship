<?php
session_start();
if(!isset($_SESSION['name'])){
    header('Location:login.php');
}
require_once('./components/index_header.php');
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="profile card card-body px-3 pt-3 pb-0">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo"></div>
                </div>
                <div class="profile-info">
                    <div class="profile-photo">
                        <img src="assets/uploads/profile_photos/<?= $_SESSION['photo']?>" class="img-fluid rounded-circle" alt="">
                    </div>
                    <div class="profile-details">
                        <div class="profile-name px-3 pt-2">
                            <h4 class="text-primary mb-0"><?= $_SESSION['name']?></h4>
                            <p>Election Commissionar</p>
                        </div>
                        <div class="profile-email px-2 pt-2">
                            <h4 class="text-muted mb-0"><?= $_SESSION['email']?></h4>
                            <p>Email</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
<?php
require_once('./components/index_footer.php');
// session_unset();
?>