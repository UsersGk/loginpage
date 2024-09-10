<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: new.php');
  }
 
include_once 'purchasefetching.php';


$invoiceno = $_GET['invoiceno'];
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

<body>
<div class="cont">
        <div class="sys">
            <img src="Brand-Logo-Design.jpg" height="100px" width="200px">
        </div>
        <div class="syss">
            <h6>Purchase_update_Invoice</h6>
        </div>    
    </div> 
            
    <form action="purchasedel.php">
        <div class="main">
            <div class="main1">
                <input type="text" name="customer" id="customer" value="<?php echo $data['CompanyName'];?>" placeholder="Customer Name"><br>
                <textarea id="address" name="address" cols="20" placeholder="Address"><?php echo $data['Address'];?></textarea>
              <Label For="purchaseledger">purchase Ledger: </Label>
                <select name="Purchaseledger"value="<?php echo $data['Purchaseledger'];?>">
                        <option value="Select">-Select-</option>
                            <option value="Purchase" <?php if($data['Purchaseledger'] == "Purchase") echo "selected"; ?>>purchase</option>
                            <option value="SundryCreditor"<?php if($data['Purchaseledger'] == "SundryCreditor") echo "selected"; ?>>SundryCreditor</option>
                            <option value="Purchasereturn"<?php if($data['Purchaseledger'] == "Purchasereturn") echo "selected"; ?>>Purchasereturn</option>
                        </select>
            </div>
            <div class="main2">
                <input type="text" name="invoiceno[]" id="invoiceno" value="<?php echo $invoiceno; ?>" placeholder="Invoice NO">
                <input type="date" name="dates" id="dates" value="<?php echo $data['Dates']; ?>">
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
                $count = 0;
                do {
                    $count++;
                ?>
                    <tr>
                        <td><input type="number" name="slno[]" id="slno<?php echo $count; ?>" class="sl" value="<?php echo $data['sno']; ?>"></td>
                        <td><input type="text" name="productName[]" id="productName<?php echo $count; ?>" value="<?php echo $data['itemName']; ?>"></td>
                        <td><input type="number" name="Qty[]" id="Qty<?php echo $count; ?>" value="<?php echo $data['Qty']; ?>" onchange="cal(this);"></td>
                        <td><input type="number" name="Rate[]" id="Rate<?php echo $count; ?>" value="<?php echo  $data['price']; ?>" onchange="cal(this);"></td>
                        <td><input type="number" name="Amt[]" id="Amt<?php echo $count; ?>" value="<?php echo  $data['total']; ?>" onchange="cal();"></td>
                        <td><input type="button" value="Delete"></td>
                    </tr>
                <?php
                } while($data = mysqli_fetch_assoc($result));
                include 'purchasefetching.php';
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
        <textarea rows="4" cols="20" placeholder="Enter Narration Here..." name="narration" id="narration"><?php echo  $data['Narration']; ?></textarea><br><br>
        <button type="submit" name="update" id="submit" class="btn-success pull-right">Submit</button>
    </form>

    <script>
        var count = $(".sl").length;
        $(document).on('click', '#addrow', function() {
            count++;
            var htmlRows = '';
            htmlRows += '<tr>';
            htmlRows += '<td><input type="number" id="slno" name="slno[]" class="sl" value="'+count+'"></td>';
            htmlRows += '<td><input type="text" name="productName[]" id="productName' + count + '"></td>';
            htmlRows += '<td><input type="number" name="Qty[]" id="Qty' + count + '" onblur="cal(this);"></td>';
            htmlRows += '<td><input type="number" name="Rate[]" id="Rate' + count + '" onblur="cal(this);"></td>';
            htmlRows += '<td><input type="text" name="Amt[]" onchange="cal();" id="Amt' + count + '"></td>';
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
