<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Library Management System(LMS)</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">User Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../signup.php">Register</a>
                </li>
            </ul>
        </div>
    </nav><br>
    <span><Marquee>This is Library Management System. Library opens at 8:00 AM and closes at 8:00 PM.</Marquee></span><br>
    <div class="row">
        <div class="col-md-4" id="side_bar">
            <h5>Library Timing</h5>
            <ul>
                <li>Opening Timing: 8:00 AM</li>
                <li>Closing Timing: 8:00 PM</li>
                <li>(Sunday off)</li>
            </ul>
            <h5>What we provide?</h5>
            <ul>
                <li>Full furniture</li>
                <li>Free Wi-Fi</li>
                <li>News Papers</li>
                <li>Discussion Room</li>
                <li>RO Water</li>
                <li>Peaceful Environment</li>
            </ul>
        </div>
        <div class="col-md-8" id="main_content">
            <center><h3>Admin Login Form</h3></center>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Email ID:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="name">Password:</label>
                    <input type="text" class="form-control" name="password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary mt-10">Login</button>
            </form>
            <?php
                if(isset($_POST['login'])){
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, "lms");
                    // Notice the curly braces: {$_POST['name']}
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    // Insecure - Do NOT use this
                    $query = "select * from admins where email = '$_POST[email]'";
                    $query_run = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($query_run)){
                        if($row['email'] == $_POST['email']){
                            if($row['password'] == $_POST['password']){
                                $_SESSION['name'] = $row['name'];
                                $_SESSION['email'] = $row['email'];
                                header("Location:admin_dashboard.php");
                            }
                            else{
                                ?>
                                <br><br><center><span class="alert alert-danger d-inline-block m-0 p-0 b-0">Wrong Password</span></center>
                                <?php
                            }
                        }
                        else{
                            echo "Wrong Email ID";
                        }
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>