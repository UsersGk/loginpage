<?php
session_start();
include_once 'Database.php';
$sno=$_POST['sno'];
$sql="delete from payment where Sno=$sno";
$result= mysqli_query($conn,$sql); // used to executed the my sql code help
if($result)
{
    $_SESSION['delete_msg'] = "User data delete successfully!";
    header("location: paydisplay.php");
}

?>