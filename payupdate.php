<?php
session_start();
 if(!isset($_SESSION['username'])){
   header('location: new.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        fieldset {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        legend {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        table {
            width: 100%;
        }
        
        label {
            width: 150px;
        }
        
        input[type="text"],
        input[type="number"],
        select {
            width: 250px;
            padding: 5px;
        }
        
        textarea {
            width: 250px;
            height: 100px;
            padding: 5px;
        }
        
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

</head>
<?php
  include 'Database.php';
   $sno=$_POST['sno'];
//    echo $sno;
//    die();
  $sql="SELECT * FROM payment where Sno=$sno";
  $result= mysqli_query($conn,$sql);
  if($result)
  {
    while ($row =mysqli_fetch_assoc($result))
    {
        $sno = $row['Sno'];
        $date = $row['Dates'];
        $customer = $row['customer'];
        $paymentmethod = $row['paymentmethod']; // Corrected variable name
        $amount = $row['amount'];
        $narration = $row['narration'];
    }
  
}
 // Update contact in the database
 if (isset($_POST['update'])) {
    $sno = $_POST['sno'];
    $date = $_POST['Date'];
    $customer = $_POST['Customer'];
    $paymentmethod = $_POST['paymethod']; // Corrected variable name
    $amount = $_POST['Amount'];
    $narration = $_POST['narration'];


     $updateSql = "UPDATE payment SET Sno='$sno', Dates='$date',customer='$customer',
     paymentmethod='$paymentmethod',amount='$amount',narration='$narration' WHERE Sno='$sno'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        if ($updateResult) {
            $_SESSION['success_msg'] = "User data update successfully!";
    
            header('Location: paydisplay.php');

            // exit();
         }
    } else {
        echo "Error updating contact: " . mysqli_error($conn);
    }

 }

      ?>
<body>
    <fieldset>
        <legend>Update_Payment</legend>
        <form action="#" method="post">
            <table>
                <tr>
                    <td><label for="id">Sno:</label></td>
                    <td><input type="text" name="sno" id="sno" value="<?php echo $sno;?>"></td>
                    <td><label for="Date">Date:</label></td>
                    <td><input type="date" name="Date" id="Date" value="<?php echo $date;?>"></td>
                </tr>
                <tr>
                    <td><label for="Customer">Customer Name:</label></td>
                    <td><input type="text" name="Customer" id="Customer"value="<?php echo $customer;?>"></td>
                </tr>
                <tr>
                    <td><label for="paymethod">Payment Method:</label></td>
                    <td>
                        <select name="paymethod" value="<?php echo $paymentmethod;?>">
                        <option value="Select">-Select-</option>
                        <option value="Rentpaid" <?php if($paymentmethod == "Rentpaid") echo "selected"; ?>>Rent paid</option>
                        <option value="salarypaid" <?php if($paymentmethod == "salarypaid") echo "selected"; ?>>salary paid</option>
                        <option value="Commisionpaid" <?php if($paymentmethod == "Commisionpaid") echo "selected"; ?>>Commision paid</option>
                        <option value="Interestpaid"<?php if($paymentmethod == "Interestpaid") echo "selected"; ?>>Interest paid</option>
                        <option value="loanpaid" <?php if($paymentmethod == "loanpaid") echo "selected"; ?>>loan paid</option>
                            <option value="otherindirectExpenses" <?php if($paymentmethod == "otherindirectExpenses") echo "selected"; ?>>otherindirect Expenses</option>
                            <option value="otherdirectExpenses" <?php if($paymentmethod == "otherdirectExpenses") echo "selected"; ?>>otherdirect Expenses</option>
                        </select>
                    </td>
                </tr>
                <!-- <tr>
                    <td><label for="BankName">Bank Name:</label></td>
                    <td><input type="text" name="BankName" id="BankName" value="<?php echo $bankname;?>"></td>
                </tr>
                <tr>
                    <td><label for="AccountNo">Account No:</label></td>
                    <td><input type="number" name="AccountNo" id="AccountNo" value="<?php echo $Accountno;?>"></td>
                </tr>
                <tr> -->
                    <td><label for="Amount">Amount:</label></td>
                    <td><input type="number" name="Amount" id="Amount" value="<?php echo $amount;?>" ></td>
                </tr>
                <tr>
                    <td><label for="narration">Narration:</label></td>
                    <td><textarea rows="4" cols="20" placeholder="Enter Narration Here..." name="narration" id="narration"><?php echo $narration;?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Save" name="update" id="update" /></td>
                </tr>
            </table>
        </form>
    </fieldset>

    <!-- SweetAlert JavaScript
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    
    <script>
        // Add event listener to the form's submit button
        document.getElementById('save').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Show a SweetAlert message
            Swal.fire({
                title: 'Saved!',
                text: 'The payment details have been saved successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script> -->
</body>
</html>
