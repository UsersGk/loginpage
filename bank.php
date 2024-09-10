<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta charset="UTF-8">
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
if(isset($_SESSION) && !empty($_SESSION['alert']) ){
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['alert']; ?>
                </div>
                <?php
                }
                unset($_SESSION['alert']);
                ?>
    <fieldset>
        <legend> Add Bank</legend>
        <form action="addbank.php" method="post">
            <table>
                <tr>
                    <td><label for="id">Sno:</label></td>
                    <td><input type="text" name="id" id="id" placeholder="serialno" ></td>
                    <td><label for="Date">Date:</label></td>
                    <td><input type="date" name="Date" id="Date" required></td>
                </tr>
                <tr>
                    <td><label for="Customer">Customer Name:</label></td>
                    <td><input type="text" name="Customer" id="Customer" placeholder="Customer Name"  required></td>
                </tr>
                <tr>
                    <td><label for="BankName">Bank Name:</label></td>
                    <td><input type="text" name="BankName" id="BankName" placeholder="Enter Bank Name" required></td>
                </tr>
                <tr>
                    <td><label for="AccountNo">Account No:</label></td>
                    <td><input type="number" name="AccountNo" id="AccountNo" placeholder="Enter Bank account no" required></td>
                </tr>
                <tr>
                    <td><label for="Amount">Balance:</label></td>
                    <td><input type="number" name="Amount" id="Amount" placeholder="Balance" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Save" name="save" id="save" /></td>
                </tr>
            </table>
        </form>
    </fieldset>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
