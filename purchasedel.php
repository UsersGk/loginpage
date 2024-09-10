<?php
session_start();
//to fixed array to string conversion
$invoiceno = implode(', ', $_GET['invoiceno']);

include 'Database.php';


// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$customer = $_GET['customer'];
$address = $_GET['address'];
// $invoiceno = $_GET['invoiceno'];
$dates = $_GET['dates'];
$subtotal = $_GET['subtotal'];
$narration = $_GET['narration'];
$disper = $_GET['disper'];
$netamt = $_GET['netamt'];
$saleledger= $_GET['Purchaseledger'];
// echo <pre>;
// var_dump($_GET);
// die();
if (isset($_GET) && !empty($_GET))  {
    //count the slno box
    $itemCount = count($_GET['slno']);
if(isset($_GET['update'])) {
    // delete the  all item of that invoceno
    $sql = "DELETE FROM purchaseinvoiceitem WHERE invoiceno = '$invoiceno'";

if (mysqli_query($conn, $sql)) {
    echo "Invoice item data deleted successfully.";
} else {
    echo "ERROR: Could not delete invoice item data. " . mysqli_error($conn);
}
}
    $i=0;

// again insert all the invoice items
    for ($i = 0; $i < $itemCount; $i++) {
        $sn = $_GET['slno'][$i];
        $pname = $_GET['productName'][$i];
        $qty = $_GET['Qty'][$i];
        $rate = $_GET['Rate'][$i];
        $Amt = $_GET['Amt'][$i];
        if( $invoiceno!==''&& $sn!=='' && $pname!=='' && $qty!=='' && $rate!==''){
            // echo "INsert the data";
        $sql = "INSERT INTO purchaseinvoiceitem (invoiceno, sno, itemName, Qty, price, total) VALUES ('$invoiceno', '$sn', '$pname', '$qty', '$rate', '$Amt')";
        $result = mysqli_query($conn, $sql);
        // echo " goto database";
        
    }
}
     if( $invoiceno!==''){
    // // echo "INsert the data";

//update the customer  table information
        $updateSql = "UPDATE purchasevendor SET CompanyName = '$customer', Address = '$address', Dates = '$dates', subtotal = '$subtotal', Discountper = '$disper', Netamount = '$netamt', Narration = '$narration',Purchaseledger='$saleledger' WHERE InvoiceNo = '$invoiceno'";
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
            $_SESSION['success_msg'] = "User data update successfully!";
    
            header('Location: purchasedisplay.php');

            // exit();
         }
        } else {
            echo "Error updating contact: " . mysqli_error($conn);
        }
    }
     else {
        echo "ERROR: not add the data in database " . mysqli_error($conn);
    }


    ?>