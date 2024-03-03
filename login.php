
<?php
session_start();
require('connection.php');

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $aadhar = $_POST['aadhar']; 
    $error="";

    // Retrieve user with the provided adhar from the database
    $query = "SELECT * FROM `user` WHERE `aadhar`='$aadhar'";
    $result = mysqli_query($con, $query);

    if($result && mysqli_num_rows($result) == 1) 
    {
        // Fetch the row from the result set
        $user = mysqli_fetch_assoc($result);
        
        if ($user['password'] == $password )
        {
            // Set session variables for logged-in user
            $name=$user['name'];
            $_SESSION['user_id'] = $aadhar;
            $_SESSION['name'] =$name;
            $_SESSION['email'] = $email;
            
            // Redirect to user dashboard
            header('location: userDashboard.php');
            exit();
        }
        else 
        { 
            $error = "Incorrect password or email";
        }            
    }
    else
    {                        
        $error = "Incorrect aadhar";
    }     
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Poppins:wght@200&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css" />

    <style>
      body {
        font-family: sans-serif;
        background-image: url("background.jpeg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
       
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-2 fixed-top"
    
    style="background-color:purple; opacity: 0.9;"
    
    >
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-2">
            <li class="nav-item">
              <a class="nav-link text-white" href="index.php">LAND REGISTERY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="login.php">LOGIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="Register.php">SIGN UP</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div
      class="container pt-5"
      style="width: 40%; position: absolute; top: 20%; left: 30%; right: 30%"
    >
    
    
      <form
        action=""
        method="post"
        class="p-3 rounded-1"
        style="background-color: #003"
      >
      <?php if (isset($error))
    {
      ?> 
      <div class="alert alert-danger alert-dismissible mb-2 "
      
      style="padding-top:8px;
      padding-bottom:8px;
      " role="alert">
        <?php
        echo $error;
        ?>
      <button type="button" class="btn-close pt-1"
      data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php 
    }
    ?>
        <div class="form-group py-1">
          <input
            type="email"
            class="form-control"
            name="email"
            placeholder="Enter your email"
            required
          />
        </div>
        <div class="form-group py-1">
          <input
            type="text"
            class="form-control"
            name="aadhar"
            placeholder="Enter your adhar number"
            required
          />
        </div>
        <div class="form-group py-1">
          <input
            type="password"
            class="form-control"
            name="password"
            placeholder="Enter Password"
            required
          />
        </div>

        <div class="form-btn mt-2">
          <input
            type="submit"
            value="Login"
            name="login"
            class="btn btn-primary rounded-1"
          />
        </div>
      </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z8Mwl8i6Z6E+0CK3ZHp3t4urp4flFk2ivT5hXf"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
