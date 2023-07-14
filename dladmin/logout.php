<?php
include('dbconnect.php');

session_start();
$id = $_SESSION['ADID'];

$querydes = "UPDATE admin SET sessionid = '' WHERE adid= '$id'";
$result = mysqli_query($conn, $querydes);
session_unset();
session_destroy();

 header('Location: index.php');
?>