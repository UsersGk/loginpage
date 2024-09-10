<?php
session_start();

include_once('./Database.php'); // Make sure the database connection is established

$old = $_POST['old_password'];
$new = $_POST['new_password'];
$confirm = $_POST['confirm_password'];
$user = $_SESSION['username'];

if (isset($_POST['submit'])) { // Check if the form is submitted
    $sql = "SELECT * FROM `login` WHERE username='$user' AND password='$old'";
    $query = mysqli_query($conn, $sql);

    if ($new == $confirm && $query) { // Check if passwords match and query was successful
        $update = "UPDATE `login` SET `password`='$new' WHERE username='$user'";
        $updatequery = mysqli_query($conn, $update);

        if (!$updatequery) {
            $_SESSION['error_msg'] = "Failed to update password";
        } else {
            session_destroy();
            header('Location: new.php');
            exit(); // Always exit after redirection
        }
    } else {
        $_SESSION['error_msg'] = "New password and confirm password do not match or old password is incorrect";
    }
} else {
    $_SESSION['error_msg'] = "Form submission error or old password is incorrect";
}

// Redirect to the appropriate page with an error message, if needed
header('Location: changepassword.php');
exit();
?>