<?php require('connection.php'); ?>
<?php
if(isset($_POST['submit']))
{ 
    $name=$_POST['name'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $email = $_POST['email'];
    $aadhar = $_POST['aadhar']; // New Aadhar field
    $error="";
    // Check if passwords match
    if($pass != $cpass)
    {

        $error="Password not matched";
    }
    else
    {
        
        // Check if the Aadhar number already exists
        $aadhar_exist_query = "SELECT * FROM `user` WHERE `aadhar`='$aadhar'";
        $aadhar_result = mysqli_query($con, $aadhar_exist_query);

        if(mysqli_num_rows($aadhar_result) > 0)
        {
            $error="Aadhar number already exists";
            exit();
        }
        else
        {
            // Insert user into database
            $query = "INSERT INTO `user` (`name`, `email`, `aadhar`, `password`)
                      VALUES ('$name', '$email', '$aadhar', '$pass')";
            if(mysqli_query($con, $query))
            {
                header("Location:login.php");
                exit();
            }
            else
            {
              
                $error="Cannot run query";
                exit();

            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Form</title>
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

  </head>
  <link rel="stylesheet" href="./style.css">
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
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark  px-5 py-2  fixed-top" 
    style="background-color:purple;  opacity: 0.9;">
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

    <form  action="Register.php" method="post" class="p-3 rounded-1" style="background-color: #003">
    <?php if (isset($error))
    {
      ?> 
      <div class="alert alert-danger alert-dismissible mb-1 "
      
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
        <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
    </div>
    <div class="form-group py-1">
        <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
    </div>
    <div class="form-group py-1">
        <input type="text" class="form-control" name="aadhar" placeholder="Enter your aadhar number" required>
    </div>
    <div class="form-group py-1">
        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
    </div>
    <div class="form-group py-1">
        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required>
    </div>

    <div class="form-btn mt-1">
    <input type="submit" class="btn btn-primary rounded-1" name="submit" value="Register"/>
    <a class="btn btn-primary rounded-1" href=".login.php">Login</a>
    </div>
    </form>
    </div>
  


  </body>
</html>
