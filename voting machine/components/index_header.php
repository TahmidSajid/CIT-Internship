<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/vendor/chartist/css/chartist.min.css">
    <link href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="assets/images/logo.png" alt="">
                <img class="logo-compact" src="assets/images/logo-text.png" alt="">
                <img class="brand-title" src="assets/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">

                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                                    <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                        <img src="assets/uploads/profile_photos/<?= $_SESSION['photo'] ?>" width="20" alt="" />
                                        <div class="header-info">
                                            <span class="text-black"><strong><?= $_SESSION['name'] ?></strong></span>
                                        </div>
                                    </a>
                                <?php } ?>
                                <?php if (isset($_SESSION['voter_role']) && $_SESSION['voter_role'] == 'voter') { ?>
                                    <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                        <img src="assets/uploads/voter_photos/<?= $_SESSION['voter_photo'] ?>" width="20" alt="" />
                                        <div class="header-info">
                                            <span class="text-black"><strong><?= $_SESSION['voter_name'] ?></strong></span>
                                        </div>
                                    </a>
                                <?php } ?>



                                <?php
                                if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                                ?>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="assets/page-login.html" class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            <span class="ml-2">Logout </span>
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($_SESSION['voter_role']) && $_SESSION['voter_role'] === 'voter') {
                                ?>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form action="./backend/logout.php" method="post">
                                            <button class="dropdown-item ai-icon">
                                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                    <polyline points="16 17 21 12 16 7"></polyline>
                                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                                </svg>
                                                <span class="ml-2">Logout </span>
                                            </button>
                                        </form>
                                    </div>
                                <?php
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <?php
                    if (isset($_SESSION['voter_role']) && $_SESSION['voter_role'] == 'voter') {
                    ?>
                        <li>
                            <a class="has-arrow ai-icon" href="./voter_index.php" aria-expanded="false">
                                <i class="flaticon-381-networking"></i>
                                <span class="nav-text">Voter Dashboard</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                    ?>
                        <li>
                            <a class="has-arrow ai-icon" href="index.php" aria-expanded="false">
                                <i class="flaticon-381-networking"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="flaticon-381-networking"></i>
                                <span class="nav-text">Candidate</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="./candidate_register.php">Candidate Register</a></li>
                                <li><a href="./candidate_list.php">Candidate List</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <div class="copyright">
                    <p><strong>Gymove Fitness Admin Dashboard</strong> © 2020 All Rights Reserved</p>
                    <p>Made with <span class="heart"></span> by DexignZone</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->