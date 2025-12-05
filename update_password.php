<?php
session_start();
$email = $_SESSION['email'];

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");

$query = "select * from users where email='$email'";
$query_run = mysqli_query($connection,$query);

if($row = mysqli_fetch_assoc($query_run)){

    if($row['password'] == $_POST['old_password']){

        $new_password = $_POST['new_password'];

        $update_query = "UPDATE users SET password='$new_password' WHERE email='$email'";
        mysqli_query($connection, $update_query);

        echo "<script>
                alert('Password Updated Successfully');
                window.location.href='user_dashboard.php';
              </script>";
    }
    else{
        echo "<script>
                alert('Old Password is Wrong. Try Again.');
                window.location.href='change_password.php';
              </script>";
    }
}
?>
