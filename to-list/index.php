<?php
session_start();

if (!$_SESSION['user_name']) {
    header("Location:./login.php");
}

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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" aria-disabled="true">
                            you are logged in as <span class="text-primary"><?php echo $_SESSION['user_name'] ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <form action="./backend/LogoutController.php">
                <button class="btn btn-danger">
                    Log out
                </button>
            </form>
        </div>
    </nav>
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
                        <th>task name</th>
                        <th>task schedule</th>
                        <th>task details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            go to store
                        </td>
                        <td>
                            10:00 AM
                        </td>
                        <td>
                            10:00 AM
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <form action="./backend/AddTaskController.php" method="POST">
                            <td>
                                Add Task
                            </td>
                            <td>
                                <input type="text" name="task_name" placeholder="Task name">
                            </td>
                            <td>
                                <input type="time" name="task_time" placeholder="Task Time">
                            </td>
                            <td>
                                <textarea name="task_detail" id="" placeholder="Task Details" cols="30" rows="10" style="resize: none; height:80px"></textarea>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <button class="btn btn-success">Add Task</button>
                                    </div>
                                </div>
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>