<?php
session_start();
include './Database.php';

$code = $_POST['code'];
$Pass = $_POST['password'];
$same = $_POST['reenter'];

$sql = "SELECT * FROM login WHERE code='$code'";
$query = mysqli_query($conn, $sql);

$count = mysqli_num_rows($query);

if ($Pass == $same && $count == 1) {
    $update = "UPDATE `login` SET `password`='$Pass' WHERE code='$code'";
    $updatequery = mysqli_query($conn, $update);

    if ($updatequery) {
        header("Location: new.php");
        exit();
    } else {
        $_SESSION['error_msg'] ="Invalid code or Password not match";
    }
}
?>
