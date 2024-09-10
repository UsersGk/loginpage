<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body,
      input {
        font-family: "Poppins", sans-serif;
      }

      .container {
        position: relative;
        width: 100%;
        background-color: #fff;
        min-height: 100vh;
        overflow: hidden;
      }

      .forms-container {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
      }

      .forgot-password {
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        left: 75%;
        width: 50%;
        transition: 1s 0.7s ease-in-out;
        display: grid;
        grid-template-columns: 1fr;
        z-index: 5;
      }

      form {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0rem 5rem;
        transition: all 0.2s 0.7s;
        overflow: hidden;
        grid-column: 1 / 2;
        grid-row: 1 / 2;
      }

      form.forgot-form {
        z-index: 2;
      }

      .title {
        font-size: 2.2rem;
        color: #444;
        margin-bottom: 10px;
      }

      .input-field {
        max-width: 380px;
        width: 100%;
        background-color: #f0f0f0;
        margin: 10px 0;
        height: 55px;
        border-radius: 55px;
        display: grid;
        grid-template-columns: 15% 85%;
        padding: 0 0.4rem;
        position: relative;
      }

      .input-field i {
        text-align: center;
        line-height: 55px;
        color: #acacac;
        transition: 0.5s;
        font-size: 1.1rem;
      }

      .input-field input {
        background: none;
        outline: none;
        border: none;
        line-height: 1;
        font-weight: 600;
        font-size: 1.1rem;
        color: #333;
      }

      .input-field input::placeholder {
        color: #aaa;
        font-weight: 500;
      }

      .btn {
        width: 150px;
        background-color: #5995fd;
        border: none;
        outline: none;
        height: 49px;
        border-radius: 49px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        margin: 10px 0;
        cursor: pointer;
        transition: 0.5s;
      }

      .btn:hover {
        background-color: #4d84e2;
      }

      .container:before {
        content: "";
        position: absolute;
        height: 2000px;
        width: 2000px;
        top: -10%;
        right: 48%;
        transform: translateY(-50%);
        background-image: linear-gradient(-45deg, #4481eb 0%, #04befe 100%);
        transition: 1.8s ease-in-out;
        border-radius: 50%;
        z-index: 6;
      }

      .image {
        width: 100%;
        transition: transform 1.1s ease-in-out;
        transition-delay: 0.4s;
      }

      .panels-container {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
      }

      .panel {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: space-around;
        text-align: center;
        z-index: 6;
      }

      .left-panel {
        pointer-events: all;
        padding: 3rem 17% 2rem 12%;
      }
    </style>
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="forgot-password">
          <form
            action="forgotupdate.php" method="post"
            onsubmit="return validatePassword()"
            class="forgot-form"
          >
            <h2 class="title">Forgot Password?</h2>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="text"
                placeholder="Enter Your Code .."
                name="code"
                id="code"
              />
    </div>
              <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                placeholder="Enter New Password"
                name="password"
                id="password"
              />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                placeholder="Re-enter Password"
                name="reenter"
                id="reenter"
              />
            </div>
            <input type="submit" value="submit" class="btn solid" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <img src="img/forgot.svg" class="image" alt="" />
          </div>
        </div>
      </div>
    </div>
    <script>
      function validatePassword() {
        // Get the password input values
        const password = document.getElementById("password").value;
        const reenter = document.getElementById("reenter").value;

        // Define regular expressions for letters, numbers, and special characters
        const letterPattern = /[a-zA-Z]/;
        const numberPattern = /\d/;

        // Check if the password meets all requirements
        if (password.length < 8) {
          alert("Password must be at least 8 characters long.");
          return false;
        }
        if (!letterPattern.test(password)) {
          alert("Password must contain letters.");
          return false;
        }
        if (!numberPattern.test(password)) {
          alert("Password must contain numbers.");
          return false;
        }

        // Check if the passwords match
        if (password !== reenter) {
          alert("Passwords do not match.");
          return false;
        }

        // If all requirements are met and passwords match, return true to submit the form
        return true;
      }
    </script>
  </body>
</html>
