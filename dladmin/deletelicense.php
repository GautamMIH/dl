<?php
$include('dbconnect.php');
if(!isset($_SESSION['session_adid'])){
    header('Location: admin.php');
  }
  
  $pos = $_SESSION['pos'];
  if($pos == "admin"){}else{
      header('Location: Licensesearch.php');
  }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NID = $_POST['NID'];
  }

$NID = $_POST['NID'];

$querynewlicensedelete = "DELETE FROM newlicense WHERE NID = '$NID'";
$result = mysqli_query($conn, $querynewlicensedelete);

$querynewlicensedelete = "DELETE FROM exam WHERE NID = '$NID'";
$result = mysqli_query($conn, $querynewlicensedelete);

$querynewlicensedelete = "DELETE FROM trials WHERE NID = '$NID'";
$result = mysqli_query($conn, $querynewlicensedelete);

header('Location: index.php');
?>