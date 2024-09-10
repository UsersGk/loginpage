<?php
session_start();
 if(!isset($_SESSION['username'])){
   header('location: new.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div id="hidden-div">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

@media print {
    button  {
        visibility: hidden;
    };
   
p{
    background-color: red;
}

}
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        h4 {
            margin-top: 20px;
        }

        .total {
            text-align: right;
        }

        .invoice-header {
            margin-bottom: 20px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-items {
            margin-bottom: 20px;
        }

        .invoice-items table {
            margin-top: 10px;
        }

        .invoice-summary {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            text-align: right;
        }

        .invoice-summary span {
            font-weight: bold;
        }
          .main {
    display: flex;
  }
  
  .main .main1 {
    
    margin: 0;
  }
  
  .main .main2 {
    width:100%;
    height: 100px;
    background-color: #148dbf;
  }
  .main .main2 h6{
    color:#fff;
    left: 0;
    margin-top: 30px;
    text-align: center;
    font-size: xx-large;
    
font-family: 'Courier New', Courier, monospace;
  }
  .main .main2 p{
text-align: center;
    font-size: medium;
    color: white;
  }
    </style>
</head>
<body>
   <div class="main">
        <div class="main1">
            <img src="Brand-Logo-Design.jpg" height="100px" width="200px">
        </div>
        <div class="main2">
           <h6><b> Inception</b></h6>
            <p>Shivraj-5,Chandrauta</p>
                </div>    
    </div>
<div class="container">

    <?php
    include 'Database.php';

    $invoiceno = $_GET['invoiceno'];
    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT customer.invoiceno, customer.Dates, customer.CompanyName, customer.Address, customer.subtotal, customer.Discountper, customer.Netamount, invoiceitem.sno, invoiceitem.itemName, invoiceitem.Qty, invoiceitem.price, invoiceitem.total,
     customer.Narration FROM `customer` INNER JOIN invoiceitem ON customer.invoiceno = invoiceitem.invoiceno WHERE customer.invoiceno = '$invoiceno'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was executed successfully
    if ($result) {
        // Fetch the data
        $data = mysqli_fetch_assoc($result);

        // Display the fetched data
        if ($data) {
            echo "<div class='invoice-header'>";
            echo "<h2>Invoice</h2>";
            echo "</div>";

            echo "<div class='invoice-details'>";
            echo "<p><strong>Invoice No:</strong> " . $data['invoiceno'] . "</p>";
            echo "<p><strong>Date:</strong> " . $data['Dates'] . "</p>";
            echo "<p><strong>Company Name:</strong> " . $data['CompanyName'] . "</p>";
            echo "<p><strong>Address:</strong> " . $data['Address'] . "</p>";
            echo "</div>";

            // Loop through the invoice items
            echo "<div class='invoice-items'>";
            echo "<h4>Invoice Items:</h4>";
            echo "<table>";
            echo "<tr><th>S.No</th><th>Item Name</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";
            do {
                echo "<tr>";
                echo "<td>" . $data['sno'] . "</td>";
                echo "<td>" . $data['itemName'] . "</td>";
                echo "<td>" . $data['Qty'] . "</td>";
                echo "<td>" . $data['price'] . "</td>";
                echo "<td>" . $data['total'] . "</td>";
                echo "</tr>";
            } while ($data = mysqli_fetch_assoc($result));
            echo "</table>";
            echo "</div>";
include 'fetching.php';
            echo "<div class='invoice-summary'>";
            echo "<p><span>Subtotal:</span> " . $data['subtotal'] . "</p>";
            echo "<p><span>Discount Percentage:</span> " . $data['Discountper'] . "%</p>";
            echo "<p><span>Vat:</span> 13% </p>";
            echo "<p><span>Net Amount:</span> " . $data['Netamount'] . "</p>";
          
            echo "</div>";
            echo "<h3><span>Narration:</span> </h3>" . $data['Narration'] . "";
        } else {
            echo "No data found for the given invoice number.";
        }

        // Free the result variable
        mysqli_free_result($result);
    } else {
        echo "Error executing the query: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</div>
</div>
<button id="print-button">Print</button>

 <script>
$(document).ready(function() {
  // Create a print button
  var printButton = $("#print-button");

  // Attach an event handler to the print button
  printButton.click(function() {
    // Get the content of the hidden div
    var content = $("#hidden-div").html();

    // Print the content
    window.print(content);
  });
}); 
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
