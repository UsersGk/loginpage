<?php
session_start();
 if(!isset($_SESSION['username'])){
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
<?php
 
   $sno=$_GET['id'];
   include 'Database.php';
//    echo $sno;
//    die();
  $sql="SELECT * FROM contra where Sno='$sno'";
  $result= mysqli_query($conn,$sql);
  if($result)
  {
    while ($row =mysqli_fetch_assoc($result))
    {
        $sno = $row['Sno'];
        $dates = $row['Date'];
        $customers = $row['customer'];
        $opts = $row['entriestype'];
        $banknames = $row['Bankname'];
        $accountnos = $row['Accountno'];
        $Amounts = $row['Balance'];
        $Narrations= $row['Narration'];
        
        
    }
  
}
 // Update contact in the database
 if (isset($_GET['update'])) {
   
    $Sno = $_GET['id'];
    $date = $_GET['Date'];
    $customer = $_GET['Customer'];
    $opt = $_GET['paymethod'];
    $bankname = $_GET['BankName'];
    $accountno = $_GET['AccountNo'];
    $Amount = $_GET['Amount'];
    $Narration= $_GET['narration'];

    $updateSql = "UPDATE `contra` SET `Sno`='$Sno', `Date`='$date', `customer`='$customer', `entriestype`='$opt', `Bankname`='$bankname', `Accountno`='$accountno', `Balance`='$Amount', `Narration`='$Narration' WHERE `Sno`='$Sno'";

    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        $_SESSION['success_msg'] = "User data update successfully!";
        header('location: contradisplay.php');
    } else {
        echo "Error updating contact: " . mysqli_error($conn);
    }

 }

      ?>
    <fieldset>
        <legend>Contra_update</legend>
        <form action="">
            <table>
                <tr>
                    <td><label for="id">Sno:</label></td>
                    <td><input type="text" name="id" id="id" placeholder="serialno" value="<?php echo $sno;?>" required></td>
                    <td><label for="Date">Date:</label></td>
                    <td><input type="date" name="Date" id="Date"  value="<?php echo $dates;?>"required></td>
                </tr>
                <tr>
                    <td><label for="Customer">Customer Name:</label></td>
                    <td><input type="text" name="Customer" id="Customer" placeholder="customer name" value="<?php echo $customers;?>" required></td>
                </tr>
                <tr>
                    <td><label for="paymethod">Entries Type:</label></td>
                    <td>
                        <select name="paymethod" value="<?php echo $opts?>">
                        <option value="Select">-Select-</option>
                        <option value="Deposit"<?php if($opts == "Deposit") echo "selected"; ?>>Deposit</option>
                        <option value="Withdraw"<?php if($opts == "Withdraw") echo "selected"; ?>>Withdraw</option>

                        </select>
                    </td>
                </tr>
                <tr>
            <td>    <label for="">Bank Name</label></td>
            <td>   <select name="BankName">
                        <?php   
                        $sql = "SELECT Bankname,Sno FROM `bank`";
                        $result = mysqli_query($conn, $sql);
                        $sql = "SELECT Bankname,Sno FROM `contra`";
                        $res = mysqli_query($conn, $sql);
                        $r = mysqli_fetch_assoc($res);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $bankName = $row['Bankname'];
                            $Sno = $row['Sno'];
                         ?>
                          <option value="<?php echo $bankName;?>"<?php if($r['Bankname'] == $bankName) echo "selected"; ?>><?php echo $bankName;?></option>
                       
                       <?php 
                        }
                        ?>
                    </select>
                </td>
            </tr>

                <tr>
                    <td><label for="AccountNo">Account No:</label></td>
                    <td><input type="number" name="AccountNo" id="AccountNo" placeholder="Account no"value="<?php echo $accountnos;?>" required></td>
                </tr> 
                <tr>
                    <td><label for="Amount">Amount:</label></td>
                    <td><input type="number" name="Amount" id="Amount" placeholder="Amount" value="<?php echo $Amounts;?>" required></td>
                </tr>
                <tr>
                    <td><label for="narration">Narration:</label></td>
                    <td><textarea rows="4" cols="20" placeholder="Enter Narration Here..." name="narration" id="narration" required><?php echo $Narrations;?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Save" name="update" id="update"></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>
