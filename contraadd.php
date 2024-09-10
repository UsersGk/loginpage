<?php
session_start();
$sno = $_POST['id'];
$date = $_POST['Date'];
$customer = $_POST['Customer'];
$opt = $_POST['paymethod'];
$bankname = $_POST['BankName'];
$accountno = $_POST['AccountNo'];
$Amount = $_POST['Amount'];
$Narration= $_POST['narration'];

// Include the Database.php file, assuming it establishes the $conn variable for the database connection
include('Database.php');

// Prepare the SQL statement to insert data into the `contra` table
$sql = "INSERT INTO `contra`(`Sno`, `Date`, `customer`, `entriestype`, `Bankname`, `Accountno`, `Balance`, `Narration`) VALUES ('$sno', '$date', '$customer', '$opt', '$bankname', '$accountno', '$Amount', '$Narration')";

// Execute the INSERT query
$result = mysqli_query($conn, $sql);

// Check if the query was executed successfully
if ($result) {
    // Get the bank's current balance
    $selectSql = "SELECT * FROM `bank` WHERE Bankname='$bankname'";
    $selectResult = mysqli_query($conn, $selectSql);

    // Check if the SELECT query was executed successfully
    if ($selectResult && mysqli_num_rows($selectResult) > 0) {
        $row = mysqli_fetch_assoc($selectResult);
        $balance = $row['Balance'];

        // Update the bank's balance based on the type of transaction (Withdraw or Deposit)
        if ($opt == 'Withdraw') {
            $total = $balance - $Amount;
        } elseif ($opt == 'Deposit') {
            $total = $balance + $Amount;
        }

        // Perform the UPDATE query to update the bank's balance
        $updateSql = "UPDATE bank SET Balance='$total' WHERE Bankname='$bankname'";
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
            $_SESSION['success_msg'] = "User data saved successfully!";
            header('location: contradisplay.php');
            exit();
        } else {
            echo "Error updating bank balance: " . mysqli_error($conn);
        }
    } else {
        echo "Error fetching bank data: " . mysqli_error($conn);
    }
} else {
    echo "Error inserting record into `contra` table: " . mysqli_error($conn);
}
?>
