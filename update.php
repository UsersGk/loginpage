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
    <link rel="stylesheet" href="sale.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<?php

include_once 'fetching.php';
$invoiceno = $_GET['invoiceno'];
header_remove("Expires");
header_remove("Cache-Control");
header_remove("Pragma");
header_remove("Last-Modified");

?>

<body>
<div class="cont">
        <div class="sys">
            <img src="Brand-Logo-Design.jpg" height="100px" width="200px">
        </div>
        <div class="syss">
            <h6>Sales_update_Invoice</h6>
        </div>    
    </div> 
            
    <form  name="frm_register" action="del.php">
        <div class="main">
            <div class="main1">
                <input type="text" name="customer" id="customer" value="<?php echo $data['CompanyName'];?>" placeholder="Customer Name" required><br>
                <textarea id="address" name="address" cols="20" placeholder="Address" required><?php echo $data['Address'];?></textarea>
              <Label For="purchaseledger">purchase Ledger: </Label>
                <select name="saleledger"value="<?php echo $data['salesledger'];?>">
                        <option value="Select">-Select-</option>
                            <option value="sales" <?php if($data['saleledger'] == "sales") echo "selected"; ?>>sales</option>
                            <option value="SundryDebtor"<?php if($data['saleledger'] == "SundryDebtor") echo "selected"; ?>>Sundrydebtor</option>
                            <option value="Salesreturn"<?php if($data['saleledger'] == "Salesreturn") echo "selected"; ?>>salesreturn</option>
</select>
            </div>
            <div class="main2">
                <input type="text" name="invoiceno[]" id="invoiceno" value="<?php echo $invoiceno; ?>" placeholder="Invoice NO" required>
                <input type="date" name="dates" id="dates" value="<?php echo $data['Dates']; ?>" required>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Sl no</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Amt</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="net">
            <?php
include 'fetching.php';
$count=0;
foreach ($result as $data) {
  $count++;
?>
    <tr>
      <td><input type="number" name="slno[]" id="slno<?php echo $count; ?>" class="sl" value="<?php echo $data['sno']; ?>" required></td>
      <td><input type="text" name="productName[]" id="productName<?php echo $count; ?>" value="<?php echo $data['itemName']; ?>" required></td>
      <td><input type="number" name="Qty[]" id="Qty<?php echo $count; ?>" value="<?php echo $data['Qty']; ?>" onchange="cal(this);" required></td>
      <td><input type="number" name="Rate[]" id="Rate<?php echo $count; ?>" value="<?php echo  $data['price']; ?>" onchange="cal(this);" required></td>
      <td><input type="number" name="Amt[]" id="Amt<?php echo $count; ?>" value="<?php echo  $data['total']; ?>" onchange="cal();" required></td>
      <td><input type="button" value="Delete"></td>
    </tr>
<?php
}
?>
            </tbody>
        </table>
        <button type="button" name="addrow" id="addrow" class="btn-success pull-right">Add New Row</button>
            <div class="calculation">
            <label for="subtotal"> Subtotal:</label>
        <input type="number" name="subtotal" id="subtotal" placeholder="Sub total" value="<?php echo  $data['subtotal']; ?>">
        <label for="disper"> Discount%:</label>
        <input type="number" name="disper" id="disper" onchange="cal();"  class="disper" placeholder="Discount%"  value="<?php echo  $data['Discountper']; ?>" >
        <label for="disamt"> Discount Amt:</label>
        <input type="text" name="disamt" id="disamt" placeholder="Discount Amt" value="0" onblur="gettotal();">
        <label for="vat"> Vat 13%:</label>
        <input type="text" name="vat" id="vat" value="13%" readonly>
 <br>  <label for="netamt"> Net Amt:</label>
        <input type="text" name="netamt" id="netamt" placeholder="Net Amt" value="<?php echo  $data['Netamount']; ?>">
        </div>
        <label for="narration">Narration:</label><br>
        <textarea rows="4" cols="20" placeholder="Enter Narration Here..." name="narration" id="narration" required><?php echo  $data['Narration']; ?></textarea><br><br>
        <button type="submit" name="update" id="submit" class="btn-success pull-right">Submit</button>
    </form>

    <script>
        var count = $(".sl").length;
        $(document).on('click', '#addrow', function() {
            count++;
            var htmlRows = '';
            htmlRows += '<tr>';
            htmlRows += '<td><input type="number" id="slno" name="slno[]" class="sl" value="'+count+'" required></td>';
            htmlRows += '<td><input type="text" name="productName[]" id="productName' + count + '" required></td>';
            htmlRows += '<td><input type="number" name="Qty[]" id="Qty' + count + '" onblur="cal(this);" required></td>';
            htmlRows += '<td><input type="number" name="Rate[]" id="Rate' + count + '" onblur="cal(this);" required></td>';
            htmlRows += '<td><input type="text" name="Amt[]" onchange="cal();" id="Amt' + count + '" required></td>';
            htmlRows += '<td><button type="button" name="remove[]" id="remove' + count + '" class="removes">Remove</button></td>';
            htmlRows += '</tr>';
            $('#net').append(htmlRows);
        });

        $(document).on('click', '.removes', function() {
            $(this).closest('tr').remove();
        });

        function cal(v) {
            var index = $(v).parent().parent().index();
            var qty = document.getElementsByName("Qty[]")[index].value;
            var rate = document.getElementsByName("Rate[]")[index].value;
            var amt = qty * rate;
            document.getElementsByName("Amt[]")[index].value = amt;
            Gettotal();
        }

        function Gettotal() {
            var sum = 0;
            var amts = document.getElementsByName("Amt[]");
            for (let index = 0; index < amts.length; index++) {
                var amt = amts[index].value;
                sum = +(sum) + +(amt);
            }
            document.getElementById("subtotal").value = sum;
            var disper = document.getElementById('disper').value;
            var discountamt = (sum * disper) / 100;
            document.getElementById('disamt').value = discountamt;
            var vat = (sum - discountamt) * 0.13;
            var netamt = sum - discountamt + vat;
            document.getElementById("netamt").value = netamt;
            cal();
        }

        $(document).on('change', '#disper', function() {
            Gettotal();
        });

        $(document).on('change', '#subtotal', function() {
            Gettotal();
        });
    </script>
</body>

</html>
