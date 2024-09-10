<?php
session_start();
include 'Database.php';
$sno=$_GET['id'];
$sql="delete from contra where Sno=$sno";
$result= mysqli_query($conn,$sql); // used to executed the my sql code help
if($result)
{
    $_SESSION['delete_msg'] = "User data delete successfully!";
    header('location: contradisplay.php');
}

?>