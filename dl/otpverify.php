<?php
include('dbconnect.php');
session_start();
$id = $_SESSION['NID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $otpuser = mysqli_real_escape_string($conn,$_POST['OTP']);
    if($_SESSION['otp']==$otpuser){
    // Generate a session ID and store it in the session
     $session_id = uniqid();
     $session_id .= bin2hex(random_bytes(2));
     $_SESSION['session_id'] = $session_id;

     $querysess= "UPDATE userdata SET sessionid = '$session_id' WHERE ID = '$id'  ";
     $result = mysqli_query($conn, $querysess);

     if (!$result) {
         die('Could not query database: ' . mysqli_error($conn));
     }

      // Generate a session ID and store it in the session
      $session_id = uniqid();
      $session_id .= bin2hex(random_bytes(2));
      $_SESSION['session_id'] = $session_id;

      $querysess= "UPDATE userdata SET sessionid = '$session_id' WHERE ID = '$id'  ";
      $result = mysqli_query($conn, $querysess);



     // Redirect the user to the other page
     header('Location: Dashboard.php');
     exit();
 } else {
     // Show a popup saying "Wrong credentials" and redirect back to the original page
     echo '<script>alert("Wrong OTP");</script>';
     header('Location: index.php');
     exit();
    }
     
 }



?>