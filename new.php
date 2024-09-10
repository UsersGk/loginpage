<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
   
    <link rel="stylesheet" href="loginstyle.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>

    <div class="container">
      <div class="forms-container">
    
        <div class="signin-signup">
     
          <form action="login.php" method="post" class="sign-in-form">
        
            <h2 class="title">Sign in</h2>
            <?php
        if(isset($_SESSION) && !empty($_SESSION['error_msg']) ){
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['error_msg']; ?>
                </div>
                <?php
                }
                unset($_SESSION['error_msg']);
                
                // exit();
                ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username"name="username"  required/>
            </div>
            <div class="input-field">
      
              <i class="fas fa-lock"></i>     
              <input type="password" placeholder="Password" id="password1"  name="password" required/>
            </div>
            <div class="forgot"><a href="forgot.php">Forgot Password?</a></div>
            <input type="submit" value="Login" name="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </form>


          <form  action="loginadd.php" method="post" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Code" name="code" required />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="password" onclick="return validatePassword()"   name="password" required/>
            </div>
            <input type="submit" class="btn"  name="Signup" value="Signup" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
             
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">Sign up</button>
          </div>
          <img src="img/login.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">Sign in</button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script>
      function validatePassword() {
          // Get the password input value
          const password = document.getElementById('password').value;

          // Define regular expressions for letters, numbers, and special characters
          const letterPattern = /[a-zA-Z]/;
          const numberPattern = /\d/;
          

          // Check if the password meets all requirements
          if (password.length < 8) {
              alert('Password must be at least 8 characters long.');
              return false;
          }
          if (!letterPattern.test(password)) {
              alert('Password must contain letters.');
              return false;
          }
          if (!numberPattern.test(password)) {
              alert('Password must contain numbers.');
              return false;
          }
          // If all requirements are met, return true to submit the form
          return true;
      }
  </script>
    <script>
      const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
      </script>
  </body>
</html>
