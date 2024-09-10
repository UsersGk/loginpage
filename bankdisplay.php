<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bank Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Bank Information</h1>
    <div class="container">
        <?php
   include_once 'Database.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from the database
    $sql = "SELECT * FROM bank";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Bank Name</th>
                    <th>Account No</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['sno']}</td>
                <td>{$row['date']}</td>
                <td>{$row['customer']}</td>
                <td>{$row['Bankname']}</td>
                <td>{$row['Accountno']}</td>
                <td>{$row['Balance']}</td>
            </tr>";
        }
        echo "</tbody>
        </table>";
    } else {
        echo "No data available.";
    }

    $conn->close();
    ?>
    </div>
</body>
</html>
