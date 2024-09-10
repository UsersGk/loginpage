<?php
session_start();
// Connect to the MySQL database
include 'Database.php';

// Check the connection
if ($conn === false) {
    die("ERROR: Could not connect to MySQL. " . mysqli_connect_error());
}

// Get the invoice number from the form
$invoice_number = $_GET['invoiceno'];
//echo $invoice_number;
// Delete the record from the database
$sql = "DELETE FROM invoiceitem WHERE invoiceno = '$invoice_number'";

if (mysqli_query($conn, $sql)) {
    $sql = "DELETE FROM customer WHERE invoiceno = '$invoice_number'";
   $result= mysqli_query($conn, $sql);
   if ($result) {
    $_SESSION['delete_msg'] = "User data Deleted successfully!";
    header("location: reports.php");
   }
} else {
    header("location: reports.php");
    // echo "ERROR: Could not delete record. " . mysqli_error($conn);
}


// Close the connection to the MySQL database
mysqli_close($conn);

?>