<?php
include('dbconnect.php');

session_start();
$id = $_SESSION['cid'];

$querydes = "UPDATE userdata SET sessionid = '' WHERE ID= '$id'";
$result = mysqli_query($conn, $querydes);
session_unset();
session_destroy();

 header('Location: index.php');
?>