<?php
$con = mysqli_connect("localhost", "root","" ,"land");
if (mysqli_connect_error()) {
    echo"<script>alert('Database not connected');</script>";
    exit();
}
?>