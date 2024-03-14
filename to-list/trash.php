<?php
session_start();

if (!$_SESSION['user_name']) {
    header("Location:./login.php");
}
$data_connect = mysqli_connect('localhost', 'root', '', 'to-do');
$user_query = "SELECT * FROM `users`";
$get_user = mysqli_query($data_connect, $user_query);
$trash = "SELECT COUNT(*) FROM `users` WHERE delete_at = 1;";
$get_trash = mysqli_query($data_connect, $trash);
$trash_fetch = mysqli_fetch_assoc($get_trash)["COUNT(*)"];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" aria-disabled="true">
                            you are logged in as <span class="text-primary"><?php echo $_SESSION['user_name'] ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <a href="./trash.php" class="btn btn-primary position-relative d-inline-block me-4">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?= $trash_fetch ?>
                    <span class="visually-hidden">unread messages</span>
                </span>
                Trash
            </a>
            <form action="./backend/LogoutController.php">
                <button class="btn btn-danger">
                    Log out
                </button>
            </form>
        </div>
    </nav>
    <?php
    if (isset($_SESSION['user_add'])) {
    ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="alert alert-primary" role="alert">
                    <?= $_SESSION['user_add'] ?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <section class="m-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    To-do tasks
                </div>
            </div>
            <table class="table table-success table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User name</th>
                        <th>User email</th>
                        <th>User role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($get_user as $key => $user) {
                        if ($user['delete_at'] == 1) {
                    ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td>
                                    <?= $user['name'] ?>
                                </td>
                                <td>
                                    <?= $user['email'] ?>
                                </td>
                                <td>
                                    <?= $user['role'] ?>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form action="./backend/DeleteController.php" method="POST">
                                                <input type="text" class="d-none" value="<?= $user['id'] ?>" name="id">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                        <div class="col-lg-6">
                                            <form action="./backend/RetiveController.php" method="POST">
                                                <input type="text" class="d-none" value="<?= $user['id'] ?>" name="id">
                                                <button type="submit" class="btn btn-success">Retrive</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>