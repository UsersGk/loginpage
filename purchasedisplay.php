<?php
session_start();
 if(!isset($_SESSION['username'])){
   header('location: new.php');
 }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Funda Of Web IT</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    
                    <div class="card-header">
                        <h4>List of the Purchase data </h4>
                        <a href="purchase.php" class="btn btn-primary">Add Purchase</a>
                    </div>
                    
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
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Invoiceno</th>
                                    <th>Date</th>
                                    <th>CompanyName</th>
                                    <th>Address</th>
                                    <th>Subtotal</th>
                                    <th>Discount%</th>
                                    <th>NetAmount</th>
                                    <th>Purchaseledger</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                include_once 'Database.php';
                                if(isset($_GET['search']))
                                {
                                    $search = $_GET['search'];
                                    $query = "SELECT * FROM purchasevendor WHERE CONCAT(invoiceno, Dates, CompanyName, Address,Purchaseledger) LIKE '%$search%'";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $items)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $items['invoiceno']; ?></td>
                                                <td><?= $items['Dates']; ?></td>
                                                <td><?= $items['CompanyName']; ?></td>
                                                <td><?= $items['Address']; ?></td>
                                                <td><?= $items['subtotal']; ?></td>
                                                <td><?= $items['Discountper']; ?></td>
                                                <td><?= $items['Netamount']; ?></td>
                                                <td><?= $items['Purchaseledger']; ?></td>
                                                <td>
                                                    <form action="purchasedelete.php" onsubmit="return confirm('Are you sure to delete?')">
                                                        <input type="hidden" name="invoiceno" value="<?php echo $items['invoiceno'];?>">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="purchaseupdate.php">
                                                        <input type="hidden" name="invoiceno" value="<?php echo $items['invoiceno'];?>">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="view.php">
                                                        <input type="hidden" name="invoiceno" value="<?php echo $items['invoiceno'];?>">
                                                        <button type="submit" class="btn btn-success">View</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="10">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
