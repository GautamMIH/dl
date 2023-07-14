<?php
session_start();
if(!isset($_SESSION['session_adid'])){
    header('Location: admin.php');
  }

  $pos = $_SESSION['pos'];
  if($pos == "admin"|| $pos=="traffic"){}else{
      header('Location: Licensesearch.php');
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NID = $_POST['NID'];
  }
include('dbconnect.php');

$queryfelony = "UPDATE license SET felony = felony+ 1 WHERE NID ='$NID'";
$result = mysqli_query($conn,$queryfelony);

header('Location:updatefelony.php');