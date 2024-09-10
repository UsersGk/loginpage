<?php
session_start();
 if(!isset($_SESSION['username']) &&(!isset($_SESSION['password']) )){
   header('location: new.php');
 }
 include_once 'Database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
                if(isset($_SESSION) && !empty($_SESSION['error_msg']) ){
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['error_msg']; ?>
                </div>
                <?php
                }
                unset($_SESSION['error_msg']);
                ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Change Password</h2>
                    </div>
                    <div class="card-body">
                        <form action="Chupdatepass.php" method="POST">
                            <div class="form-group">
                                <label for="old_password">Old Password:</label>
                                <input type="password" class="form-control" name="old_password" required>
                            </div>

                            <div class="form-group">
                                <label for="new_password">New Password:</label>
                                <input type="password" class="form-control" name="new_password" required>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" class="form-control" name="confirm_password" required>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                        </form>
            
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
