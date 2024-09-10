<?php
include_once 'Database.php';

$invoiceno = $_GET['invoiceno'];
// echo $invoiceno;

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql ="SELECT purchasevendor.invoiceno, purchasevendor.Dates, purchasevendor.CompanyName, purchasevendor.Address,purchasevendor.Purchaseledger ,purchasevendor.subtotal, purchasevendor.Discountper, purchasevendor.Netamount, purchaseinvoice.sno, purchaseinvoice.itemName, purchaseinvoice.Qty, purchaseinvoice.price, purchaseinvoice.total,purchasevendor.Narration FROM `purchasevendor` INNER JOIN purchaseinvoice ON purchasevendor.invoiceno = purchaseinvoice.invoiceno WHERE purchasevendor.invoiceno = '$invoiceno'";
$result = mysqli_query($conn, $sql);

// Check if the query was executed successfully
if ($result) {
    // Fetch the data
    $data = mysqli_fetch_assoc($result);
}

?>