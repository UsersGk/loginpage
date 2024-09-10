<?php
// Make sure to include the Database.php file or establish the database connection here
require_once 'Database.php';

// Get the invoice number from the URL parameter
$invoiceno = $_GET['invoiceno'];

// Perform query to get invoice items
$sql = "SELECT * FROM invoiceitem WHERE invoiceno = '$invoiceno'";
$result = mysqli_query($conn, $sql);

// Perform query to get customer data
$sq = "SELECT * FROM customer WHERE invoiceno = '$invoiceno'";
$res = mysqli_query($conn, $sq);
$sum = 0;

while ($data = mysqli_fetch_assoc($res)) {
    $name = $data['CompanyName'];
    $date = $data['Dates'];
    $dis = $data['Discountper'];
    $subtotal = $data['subtotal'];
    $sum = $subtotal + $sum;
}

// Check if the queries were successful
if (!$result || !$res) {
    die("Database query failed: " . mysqli_error($conn));
}

// Start generating the HTML content
$html = '<style>
    @page {
        size: A4;
        margin: 2px;
    }
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid black;
        margin-top: 10px;
    }
    th, td {
        border: 1px solid black;
        padding: 4px;
        text-align: left;
    }
    .center {
        text-align: center;
    }
    .bold {
        font-weight: bold;
    }
</style>';

$html .= '<table>
<tr>
    <td colspan="5" class="center bold">Inception</td>
</tr>
<tr>
    <td class="bold">Customer Name:</td>
    <td class="center bold" colspan="4">' . $name . '</td>
</tr>
<tr>
    <td class="bold">Date:</td>
    <td class="center">' . $date . '</td>
</tr>
<tr>
    <th class="bold">Sno</th>
    <th class="bold">Item Name</th>
    <th class="bold">Qty</th>
    <th class="bold">Price</th>
    <th class="bold">Amount</th>
</tr>';

$count = mysqli_num_rows($result); // Number of rows for calculations
$sumFormula = "=SUM(E5:E" . ($count + 4) . ")"; // Adjusted sum range
$disamt = $sum * $dis / 100;
$gross = $sum - $disamt;
$vat=($gross*0.13);


while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
        <td>' . $row['sno'] . '</td>
        <td>' . $row['itemName'] . '</td>
        <td>' . $row['Qty'] . '</td>
        <td>' . $row['price'] . '</td>
        <td>' . $row['total'] . '</td>
    </tr>';
}

$html .= '<tr>
    <td></td>
    <td></td>
    <td colspan="2">Total</td>
    <td>' . $sumFormula . '</td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td colspan="2">Discount Amount</td>
    <td>' . $sumFormula . '*' . $dis . '/100</td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td colspan="2">Gross</td>
    <td>=' . $sum . ' - ' . $disamt . '</td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td colspan="2">Vat: 13%</td>
    <td>=' . $gross . '*' . 13 . '%</td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td colspan="2">Net Amount</td>
    <td>=' . $gross . ' + ' . $vat . '</td>
</tr>';

$html .= '</table>';

// Set headers for Excel output
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $name . '.xls"');

// Output the generated HTML content
echo $html;
?>
