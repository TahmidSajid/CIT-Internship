<?php
session_start();
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
    <div class="container-fluid">
        <nav class="navbar bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h3>To-do </h3>
                </a>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 p-4">
                <form action="./backend/RegisterController.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="name" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Have an account then <a href="login.php">login</a></label>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign up</button>
                </form>
            </div>
        </div>
        <?php
        if (isset($_SESSION['admin_exist'])) {
        ?>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="alert alert-warning">
                    <?= $_SESSION['admin_exist']?>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>



<?php

session_unset()

?>