<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    // Notice the curly braces: {$_POST['name']}
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    // Insecure - Do NOT use this
    $query = "insert into users (name, email, password, mobile, address) values('{$name}', '{$email}', '{$password}', '{$mobile}', '{$address}')";
    $query_run = mysqli_query($connection, $query);
?>
<script>
    alert("Registration Successful...You may login now.");
    window.location.href = "login.php";
</script>