<?php
include 'Database.php';

// Initialize variables for calculations
$sale = $salereturn = $saledebtor = $purchase = $SundryCreditor = $SundryDebtor = $bank = $p = $r = 0;

$sql = "SELECT * FROM customer WHERE saleledger='sales'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Netamount = $row['Netamount'];
    $sale += $Netamount;
}

$sql = "SELECT * FROM customer WHERE saleledger='Salesreturn'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Netamount = $row['Netamount'];
    $salereturn += $Netamount;
}

$sql = "SELECT * FROM customer WHERE saleledger='SundryDebtor'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Netamount = $row['Netamount'];
    $saledebtor += $Netamount;
}

$sql = "SELECT * FROM purchasevendor WHERE Purchaseledger='Purchase'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Netamount = $row['Netamount'];
    $purchase += $Netamount;
}

$sql = "SELECT * FROM purchasevendor WHERE Purchaseledger='SundryCreditor'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Netamount = $row['Netamount'];
    $SundryCreditor += $Netamount;
}

$sql = "SELECT * FROM purchasevendor WHERE Purchaseledger='Purchasereturn'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Netamount = $row['Netamount'];
    $SundryCreditor += $Netamount;
}

$sql = "SELECT * FROM purchasevendor WHERE Purchaseledger='SundryDebtor'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Netamount = $row['Netamount'];
    $SundryDebtor += $Netamount;
}

$sql = "SELECT * FROM bank";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Netamount = $row['Balance'];
    $bank += $Netamount;
}

$sql = "SELECT * FROM payment";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Netamount = $row['amount'];
    $p += $Netamount;
}

$sql = "SELECT * FROM receipt";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Netamount = $row['amount'];
    $r += $Netamount;
}

// Calculate Profit/Loss
$profit_loss = ($sale - $salereturn - $SundryCreditor) - ($purchase - $SundryDebtor + $p) + ($r+$bank);

// Display Profit/Loss
if ($profit_loss > 0) {
    echo "The company made a profit of <b>$" . $profit_loss . "</b>.";
} else if ($profit_loss < 0) {
    echo "The company incurred a loss of <b>$" . abs($profit_loss) . "</b>.";
} else {
    echo "The company broke even.";
}

echo "<br>";
echo "Sales: $" . $sale . "<br>";
echo "Sales Returns: $" . $salereturn . "<br>";
echo "Purchase: $" . $purchase . "<br>";
echo "Sundry Debtors: $" . $saledebtor . "<br>";
echo "Sundry Creditors: $" . $SundryCreditor . "<br>";
echo "Bank Balance: $" . $bank . "<br>";
echo "Payments: $" . $p . "<br>";
echo "Receipts: $" . $r . "<br>";
echo "Profit/Loss: $" . $profit_loss . "<br>";

?>