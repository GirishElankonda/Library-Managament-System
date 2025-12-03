<?php 
    session_start();
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $name = "";
    $email = "";
    $mobile = "";
    $address = "";
    $query = "select * from users where email = '$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($query_run)){
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = $row['address'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User DashBoard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <!-- Left -->
    <a class="navbar-brand" href="user_dashboard.php">Library Management System (LMS)</a>

    <!-- Middle -->
    <div class="mx-auto d-flex align-items-center text-white">
      <span class="fw-bold me-4">
        Welcome: <?php echo htmlspecialchars($_SESSION['name']); ?>
      </span>
      <span class="fw-bold">
        Email: <?php echo htmlspecialchars($_SESSION['email']); ?>
      </span>
    </div>

    <!-- Right -->
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          My Profile
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
          <li><a class="dropdown-item" href="view_profile.php">View Profile</a></li>
          <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
          <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<br>
    <span><Marquee>This is Library Management System. Library opens at 8:00 AM and closes at 8:00 PM.</Marquee></span><br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name?>" disabled>
                    <label for="name">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email?>" disabled>
                    <label for="name">Mobile:</label>
                    <input type="number" class="form-control" name="mobile" value="<?php echo $mobile?>" disabled>
                    <label for="name">Address:</label>
                    <textarea rows="3" cols="40" class="form-control" name="address" placeholder="Address goes here." disabled><?php echo htmlspecialchars($address); ?></textarea>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
</html>