<?php
session_start();
include_once ('Database.php');
if ($conn === false) {
    die("ERROR: Could not connect to MySQL. " . mysqli_connect_error());
}

$customer = $_POST['customer'];
$address = $_POST['address'];
$invoiceno = $_POST['invoiceno'];
$dates = $_POST['dates'];
$subtotal = $_POST['subtotal'];
$narration = $_POST['narration'];
$disper = $_POST['disper'];
$netamt = $_POST['netamt'];
$sale= $_POST['saleledger'];

// var_dump($_POST);
// die();
if (isset($_POST) && !empty($_POST)) {
    $itemCount = count($_POST['slno']);
    $i=0;
// echo $invoiceno;
//$Amt=0;
    for ($i = 0; $i < $itemCount; $i++) {
        $sn = $_POST['slno'][$i];
        $pname = $_POST['productName'][$i];
        $qty = $_POST['Qty'][$i];
        $rate = $_POST['Rate'][$i];
        $Amt = $_POST['Amt'][$i];
        if( $invoiceno!==''&& $sn!=='' && $pname!=='' && $qty!=='' && $rate!==''){
            // echo "INsert the data";
        $sql = "INSERT INTO invoiceitem (invoiceno,sno, itemName, Qty, price, total) VALUES ('$invoiceno','$sn', '$pname', '$qty', '$rate', '$Amt')";
        $result = mysqli_query($conn, $sql);
        // echo " goto database";
        
    }
}
     if( $invoiceno!==''){
    // // echo "INsert the data";

     $sql = "INSERT INTO customer (invoiceno, Dates, CompanyName, Address, subtotal, Discountper, Netamount, Narration,saleledger) VALUES ('$invoiceno', '$dates', '$customer', '$address','$subtotal', '$disper', '$netamt', '$narration','$sale')";
        $result = mysqli_query($conn, $sql);
    
        if($result)
        {
            $_SESSION['success_msg'] = "User data saved successfully!";
            header("location: reports.php");
            exit();
        }
     }
        
    } else {
        header("location: reports.php");
        exit();
        // echo "ERROR: not add the data in database " . mysqli_error($conn);
    }
// }
    

    // if ($result) {
    //     header('location: form.php');
    // 
?>
