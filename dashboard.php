<?php
session_start();

 if(!isset($_SESSION['username'])){

   header('location: new.php');
 }
 include_once 'Database.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>INVOSNAP</title>
    <script>
    // Replace the current history state with a new state
    history.pushState(null, null, location.href);
    
    // Listen for the popstate event (triggered by the back button)
    window.addEventListener('popstate', function(event) {
        // Restore the current state
        history.pushState(null, null, location.href);
    });
</script>

    <link rel="stylesheet" href="style.css" />

    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <!-- code for dashboard start -->
    <div class="sidebar">
      <div class="sidebar-name">
        <h1><span>Inception</span></h1>
      </div>

      <div class="sidebar-menu">
        <ul>
          <li>
            <a
              href=""
              class="side"
              type="button"
              data-bs-toggle="collapse"
              aria-expanded="false"
              ><i class="fa fa-home"></i><span>Dashboard</span></a
            >
          </li>
          <li>
            <div
              class="side d-flex align-items-center color-dark"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#purchase"
              aria-expanded="false"
              aria-controls="purchase"
            >
              <a><i class="fa fa-shopping-bag"></i><span>Purchase </span> </a>
              <div class="card-body">
                <i class="fa fa-caret-right"></i>
              </div>
            </div>
            <div class="collapse" id="purchase">
              <p class="ps-5">
                <a href="purchase.php" class="dark">Add Purchase</a>
              </p>
              <p class="ps-5">
                <a href="purchasedisplay.php" class="dark">Manage Purchase</a>
              </p>
            </div>
          </li>

          <li>
            <div
              class="side d-flex align-items-center color-dark"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#Sales"
              aria-expanded="false"
              aria-controls="Sales"
            >
              <a><i class="fa fa-shopping-cart"></i><span>Sales</span> </a>
              <div class="card-body">
                <i class="fa fa-caret-right"></i>
              </div>
            </div>
            <div class="collapse" id="Sales">
              <p class="ps-5"><a href="form.php">Add Sales</a></p>
              <p class="ps-5"><a href="reports.php">Manage Sales</a></p>
            </div>
          </li>

          <li>
            <div
              class="side d-flex justify-content-between align-items-center color-dark"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#Payment"
              aria-expanded="false"
              aria-controls="Payment"
            >
              <a><i class="fa fa-credit-card"></i><span>Payment </span> </a>
              <div class="card-body">
                <i class="fa fa-caret-right"></i>
              </div>
            </div>
            <div class="collapse" id="Payment">
              <p class="ps-5"><a href="payment.php">Add Payment</a></p>
              <p class="ps-5">
                <a href="paydisplay.php">Manage Payment</a>
              </p>
            </div>
          </li>

          <li>
            <div
              class="side d-flex justify-content-between align-items-center color-dark"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#Receipt"
              aria-expanded="false"
              aria-controls="Receipt"
            >
              <a><i class="fa fa-receipt"></i><span>Receipt </span> </a>
              <div class="card-body">
                <i class="fa fa-caret-right"></i>
              </div>
            </div>
            <div class="collapse" id="Receipt">
              <p class="ps-5"><a href="receipt.php">Add Receipt</a></p>
              <p class="ps-5">
                <a href="receiptdisplay.php">Manage Receipt</a>
              </p>
            </div>
          </li>
          <li>
            <div
              class="side d-flex justify-content-between align-items-center color-dark"
              class="side"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#Contra"
              aria-expanded="false"
              aria-controls="Contra"
            >
              <a><i class="fa fa-bank"></i><span>Contra</span> </a>
              <div class="card-body">
                <i class="fa fa-caret-right"></i>
              </div>
              <!-- <span>
                <p value="0">
                  <?php echo $sum; ?>
                </p>
              </span> -->
            </div>
            <div class="collapse" id="Contra">
              <p class="ps-5"><a href="bank.php">Add Bank</a></p>
              <p class="ps-5"><a href="bankdisplay.php">Display Info.</a></p>
              <p class="ps-5"><a href="contra.php">Add contra</a></p>
              <p class="ps-5">
                <a href="contradisplay.php">Manage Contra</a>
              </p>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <!-- code for dashboard end -->

    <!-- code for top nav start -->
    <div class="main-content">
      <header>
        <h1>
          <label for="">
            <span class="fa fa-bars"></span>
            DashboardX
          </label>
        </h1>
        <div class="dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="fa fa-user"></i> <?php if(isset($_SESSION['username'])){
              echo $_SESSION['username'];
            }else{
              echo "Welcome";
            }
            ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" >
            <li><a class="dropdown-item" href="changepassword.php"><i class="fa-solid fa-lock"></i> Change password</a></li>
            <li><a class="dropdown-item" href="logout.php?action=logout"><i class="fa-solid fa-right-from-bracket"></i> Log out</a></li>
          </ul>
        </div>
      </header>
    </div>

    <!-- code for top nav end -->
    <!-- <?php
  include './total.php';
  ?> -->
    <main>
      <!-- code for cards start -->
      <div class="card">
        <div class="card-body">
          <h1>Bank <i class="fa-solid fa-scale-balanced"></i></h1>
          <span>
            <p value="">
              <?php echo $bank; ?>
            </p>
          </span> 
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h1>Purchase <i class="fa-solid fa-bag-shopping"></i></h1>
           <span>
            <p value="">
        <?php echo $purchase;?>  
            </p>
          </span>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h1>Sales <i class="fa-solid fa-shopping-cart"></i></h1>
          <span>
            <p value="">
              <?php echo $sale; ?>
            </p>
          </span>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h1>Payment <i class="fa-solid fa-credit-card"></i></h1>
          <span>
            <p value="">
              <?php echo $p; ?>
            </p>
          </span>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h1>Receipt <i class="fa-solid fa-receipt"></i></h1>
          <span>
            <p value="">
              <?php echo $r; ?>
            </p>
          </span>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h1>Profit/Loss <i class="fa-solid fa-arrow-trend-up"></i></h1>
          <span>
            <p value="">
              <?php if ($profit_loss > 0) {
    echo "<b> Profit Rs " . $profit_loss . "</b>.";
} else if ($profit_loss < 0) {
    echo "<b> Loss Rs  " . abs($profit_loss) . "</b>.";
} else {
    echo "<b>Rs" . $profit_loss . "</b>.";
}
 ?>
            </p>
          </span>
        </div>
      </div>

      <!-- code for cards end -->
    </main>
   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  

  </body>
</html>
