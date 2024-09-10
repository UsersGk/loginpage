<?php
session_start();
 if(!isset($_SESSION['username']) &&(!isset($_SESSION['password']) )){
   header('location: new.php');
 }
 include_once 'Database.php';
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
        option:nth-child(2):active {
  background-color: red; /* Change this to the desired background color */
  color: #fff; /* Change this to the desired text color */
}
      
    </style>
</head>
<body>
    <fieldset>
        <legend>Contra</legend>
        <form action="contraadd.php" method="post">
            <table>
                <tr>
                    <td><label for="id">Sno:</label></td>
                    <td><input type="text" name="id" id="id" placeholder="serialno" required></td>
                    <td><label for="Date">Date:</label></td>
                    <td><input type="date" name="Date" id="Date"required></td>
                </tr>
                <tr>
                    <td><label for="Customer">Customer Name:</label></td>
                    <td><input type="text" name="Customer" id="Customer" placeholder="customer name" required></td>
                </tr>
                <tr>
                    <td><label for="paymethod">Entries Type:</label></td>
                    <td>
                        <select name="paymethod">
                        <option value="Select">-Select-</option>
                        <option value="Deposit">Deposit</option>
                        <option value="Withdraw">Withdraw</option>

                        </select>
                    </td>
                </tr>
                <tr>
    <td><label for="BankName">Bank Name:</label></td>
    <td>
        <select name="BankName">
            <?php   
            $sql = "SELECT Bankname FROM `bank`";
            $result = mysqli_query($conn, $sql); // Execute the MySQL query
            
            while ($row = mysqli_fetch_assoc($result)) {
                $bankName = $row['Bankname'];
                echo "<option value=\"$bankName\">$bankName</option>";
            }
            ?>
        </select>
    </td>
</tr>

                <tr>
                    <td><label for="AccountNo">Account No:</label></td>
                    <td><input type="number" name="AccountNo" id="AccountNo" placeholder="Account no" required></td>
                </tr> 
                <tr>
                    <td><label for="Amount">Amount:</label></td>
                    <td><input type="number" name="Amount" id="Amount" placeholder="Amount" required></td>
                </tr>
                <tr>
                    <td><label for="narration">Narration:</label></td>
                    <td><textarea rows="4" cols="20" placeholder="Enter Narration Here..." name="narration" id="narration" required></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Save" name="save" id="save"></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>
