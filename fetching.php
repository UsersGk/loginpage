<?php
include 'Database.php';

$invoiceno = $_GET['invoiceno'];
// echo $invoiceno;

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT customer.invoiceno, customer.Dates, customer.CompanyName, customer.Address,customer.saleledger ,customer.subtotal, customer.Discountper, customer.Netamount, invoiceitem.sno, invoiceitem.itemName, invoiceitem.Qty, invoiceitem.price, invoiceitem.total,customer.Narration FROM `customer` INNER JOIN invoiceitem ON customer.invoiceno = invoiceitem.invoiceno WHERE customer.invoiceno = '$invoiceno'";
$result = mysqli_query($conn, $sql);

// Check if the query was executed successfully
if ($result) {
    // Fetch the data
    $data = mysqli_fetch_assoc($result);
}

?>