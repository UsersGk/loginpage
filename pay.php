<?php
 session_start();
 $sno = $_POST['id'];
 $date = $_POST['Date'];
 $customer = $_POST['Customer'];
 $paymentmethod = $_POST['paymethod']; // Corrected variable name
 $amount = $_POST['Amount'];
 $narration = $_POST['narration'];
 
include_once 'Database.php';
// var_dump($_POST);
$sql="INSERT INTO payment(Sno,Dates,customer,
paymentmethod,amount,narration)values('$sno','$date','$customer',
'$paymentmethod','$amount','$narration')";
$result= mysqli_query($conn,$sql); // used to executed the my sql code help
if($result)
{
    $_SESSION['success_msg'] = "User data saved successfully!";
    header("location: paydisplay.php");
}
?>