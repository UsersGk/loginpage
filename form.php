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
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</head>

<body>
<div class="cont">
        <div class="sys">
            <img src="Brand-Logo-Design.jpg" height="100px" width="200px">
        </div>
        <div class="syss">
            <h6>Invoice</h6>
        </div>    
    </div> 
            
         
    <form name="frm_register" action="add.php" method="post">
        <div class="main">
            <div class="main1">
                <input type="text" name="customer" id="customer" placeholder="Customer Name" required><br>
                <textarea id="address" name="address" cols="20" placeholder="Address"required></textarea>
                <label for="saleledger">Sale ledger: </label>
                <select name="saleledger" >
                        <option value="Select">-Select-</option>
                            <option value="sales">sales</option>
                            <option value="SundryDebtor">SundryDebtor</option>
                            <option value="Salesreturn">Salesreturn</option>
                        </select>
            </div>
            <div class="main2">
                <input type="text" name="invoiceno" id="invoiceno" placeholder="Invoice NO" required>
                <input type="date" name="dates" id="dates" required>
            </div>
        </div>
        <table class="table table-striped">
            <thead >
                <tr>
                    <th scope="col" style="background-color: #148dbf;color:white;text-align:center;">Sl no</th>
                    <th scope="col" style="background-color: #148dbf;color:white;text-align:center;">Product Name</th>
                    <th scope="col" style="background-color: #148dbf;color:white;text-align:center;">Qty</th>
                    <th scope="col" style="background-color: #148dbf;color:white;text-align:center;">Rate</th>
                    <th scope="col"style="background-color: #148dbf;color:white;text-align:center;">Amt</th>
                    <th scope="col" style="background-color: #148dbf;color:white;text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody id="net">
                <tr>
                    <td><input type="number" name="slno[]" id="slno" class="sl" value="1" required></td>
                    <td><input type="text" name="productName[]" id="productName1" required></td>
                    <td><input type="number" name="Qty[]" id="Qty1" onchange="cal(this);" required></td>
                    <td><input type="number" name="Rate[]" id="Rate1" onchange="cal(this);" required></td>
                    <td><input type="number" name="Amt[]" id="Amt1" onchange="cal();" required></td>
                    <td> </td>
                </tr>
            </tbody>
        </table>
        <button type="button" name="addrow" id="addrow" class="btn-success pull-right">Add New Row</button>
        <!-- <br><br><br> -->
        <div class="calculation">
            <label for="subtotal"> Subtotal:</label>
        <input type="number" name="subtotal" id="subtotal" placeholder="Sub total">
        <label for="disper"> Discount%:</label>
        <input type="number" name="disper" id="disper" onchange="cal();"  class="disper" placeholder="Discount%">
        <label for="disamt"> Discount Amt:</label>
        <input type="text" name="disamt" id="disamt" placeholder="Discount Amt" value="0" onblur="gettotal();">
        <label for="vat"> Vat 13%:</label>
        <input type="text" name="vat" id="vat" value="13%" readonly>
 <br>  <label for="netamt"> Net Amt:</label>
        <input type="text" name="netamt" id="netamt" placeholder="Net Amt">
        </div>

        <!-- <br><br><br> -->
        <label for="narration">Narration:</label><br>
        <textarea rows="4" cols="20" placeholder="Enter Narration Here..." name="narration" id="narration" required></textarea><br><br>
        <input type="submit" name="update" id="submit" class="btn-success pull-right" value="submit">
    </form>

    <script>
        var count = $(".sl").length;
        $(document).on('click', '#addrow', function() {
            count++;
            var htmlRows = '';
            htmlRows += '<tr>';
            htmlRows += '<td><input type="number" id="slno" name="slno[]" class="sl"  value="'+count+'" required></td>';
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
