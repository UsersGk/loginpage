<?php
session_start();
if (session_destroy()) {
    header('location: new.php');
    exit(); // Make sure to exit after redirection
}
?>
