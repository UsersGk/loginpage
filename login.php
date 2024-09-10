<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'newinvoicephp',3307);
$user = $_POST['username'];
$pass = $_POST['password'];

if (!empty($_POST) && isset($_POST['Login'])) {
    $sql = "SELECT * FROM `login` WHERE username = '$user' && password ='$pass'";
    $result = mysqli_query($conn, $sql);
   //$data = mysqli_fetch_assoc($result); // Fetch the user data
$count=mysqli_num_rows($result);
    if ($count==1) {
        // Set session variables
        $_SESSION['username'] = "$user";
            // Redirect to dashboard on successful login
        header('location: dashboard.php');
    } else {
        header('location: new.php');
        $_SESSION['error_msg']="Invalid login";
       // echo "ERROR: Invalid username or password.";
    }
}
?>
