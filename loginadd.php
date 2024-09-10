<?php
$conn=mysqli_connect('localhost','root','','newinvoicephp');
// if($conn)
// {
//     echo "Connecting to";
// }else{
//     echo "No connection";
// }
$code=$_POST['code'];
$user=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['password'];
include_once('./filter.php');
$user = filterInput($user);
    $email = filterInput($email);
    $pass = filterInput($pass);
    $code = filterInput($code);
// var_dump($_POST);

if(isset($_POST['Signup'])&& !empty($_POST)){
$sql="INSERT INTO `login`( `code`, `username`, `email`, `password`) 
VALUES ('$code','$user',' $email','$pass')";
$query=mysqli_query($conn,$sql);
if($query)
{
    header("Location: new.php");
    exit();
}
}

?>