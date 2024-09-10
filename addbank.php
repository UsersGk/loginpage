<?php
session_start();
       include 'Database.php';
      $sn = $_POST['id'];
      $date = $_POST['Date'];
      $customer = $_POST['Customer'];
      $bankname = $_POST['BankName'];
      $account = $_POST['AccountNo'];
      $balance = $_POST['Amount'];
 
    if (isset($_POST) && isset($_POST['save'])) {
       
        // if (isset($_POST) ) {
 
          
            $sql="SELECT * FROM `bank` WHERE Bankname='$bankname'";
$result= mysqli_query($conn,$sql); // used to executed the my sql code help
$data=mysqli_num_rows($result);
if ($data==0)
{
$sql = "INSERT INTO bank (sno, date, customer, Bankname, Accountno, Balance) 
        VALUES ('$sn', '$date', '$customer', '$bankname', '$account', '$balance')";
$restult=mysqli_query($conn, $sql);
if ($restult){
    $_SESSION['success_msg'] = "User data saved successfully!";
    header('location: bank.php');
    exit();
}
else{
    $_SESSION['alert'] = "Found Same Bank already!";
    header('location: bank.php');
}
        }
        else{
            header('location: bank.php');
        }
    }

    ?>