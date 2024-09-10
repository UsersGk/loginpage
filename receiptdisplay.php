<?php
session_start();
 if(!isset($_SESSION['username'])){
   header('location: new.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
       
        }

        form {
            display: inline-block;
            margin-right: 5px;
        }

        button {
            padding: 5px 10px;
            background-color: #f44336;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #d32f2f;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        th {
            text-align: center;
            background-color: green;
            color: white;
                }
    </style>
</head>
<body>
<?php
                if(isset($_SESSION) && !empty($_SESSION['success_msg']) ){
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['success_msg']; ?>
                </div>
                <?php
                }
                unset($_SESSION['success_msg']);
                ?>
                <?php
                    if(isset($_SESSION) && !empty($_SESSION['delete_msg'])){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['delete_msg']; ?>
                </div>
                <?php
                }
                unset($_SESSION['delete_msg']);
                ?>
<table border="1" cellspacing="5">
    <tr>
      <thead>
      <th>sno</th>
      <th>Date</th>
      <th>Customer</th>
      <th>Expenses Type</th>
      <th>Amount</th>
<th>Narration</th>
      <th colspan="2">Action </th>
</thead>
</tr>
  <?php
  include ('./Database.php');
  // $id=$_POST['id'];
  $sql="SELECT * FROM receipt";
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
       
      ?>
      <tr>
        <td><?php echo $sno;?></td>
        <td><?php echo $date;?></td>
        <td><?php echo $customer;?></td>
        <td><?php echo $paymentmethod;?></td>
        <td><?php echo $amount;?></td>
        <td><?php echo $narration;?></td>
        <td>
          <form action="receiptdel.php"  onsubmit="return confirm('Are you sure to delete?')">
          <input type="hidden" name="sno" value="<?php echo $sno?>">
           <button type="submit">Delete</button>
          </form>
    </td>
    <td>
    <form action="receiptupdate.php">
    <input type="hidden" name="sno" value="<?php echo $sno?>">
    <input type="submit" value="update">
  </form>
    </td>
    </tr>

      <?php

    }
  }
  $conn->close();
  ?>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>