<?php
session_start();
$userName=$_SESSION['name'] ;
$userId = $_SESSION['user_id'];
$userEmail= $_SESSION['email'];
require('connection.php');

// Check if user is not logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit(); // Stop further execution
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <title>User Dashboard</title>
    <link rel="stylesheet" href="./style.css">

  </head>
  <style>
       body {
        background-image: linear-gradient(to right, blue, pink);


       }
  
  </style>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark px-5 py-2  fixed-top"
  style="background-color:purple">
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
              <a class="nav-link text-white" href="logout.php">LOGOUT</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <div class="d-flex" style="margin-top:70px">
      <div class="w-100 ">
        <a
          href="adduser.php"
          class="w-100 bg-dark text-white text-decoration-none"
        >
          <button class="w-100 bg-danger border-0 py-3 text-white font-italic 
          " style="font-weight:600">
            Register Land Details
          </button>
        </a>
      </div>

      <div class="w-100">
        <a
          href="Availableproperties.php"
          class="w-100 bg-danger text-white text-decoration-none"
        >
          <button class="w-100 bg-secondary border-0 py-3 text-white font-italic 
          " style="font-weight:600">
            Available Properties
          </button>
        </a>
      </div>

      <div class="w-100">
        <a
          href="ownerdetails.php"
          class="w-100 bg-success text-white text-decoration-none"
        >
          <button class="w-100 bg-warning border-0 py-3 text-white font-italic 
          " style="font-weight:600">Owner Details</button>
        </a>
      </div>
    </div>

    <div class="d-flex justify-content-center align-items-center " style="margin-top:150px;">
      <div><img src="avatar.png" class="rounded" alt="..."width="200px"height="200px"></div>
      <div class="d-flex flex-column text-white" style="font-weight:600 ;font-size:20px;">
      <p class="pl-3 mb-1 "><?php echo $userName;?></p>
      <p class="pl-3 mb-1"><?php echo $userEmail;?></p>
      <p class="pl-3 mb-1"><?php echo $userId;?></p>
      <div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
