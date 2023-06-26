<?php
session_start();
include('dbconnect.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user's ID and password from the form
    $id = $_POST['NID'];
    $phone = $_POST['phone'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dl');

    // Check if the connection was successful
    if (!$conn) {
        die('Could not connect to database: ' . mysqli_connect_error());
    }

    // Query the database for the user's ID and password
    $query = "SELECT * FROM userdata WHERE ID='$id' AND phone='$phone'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die('Could not query database: ' . mysqli_error($conn));
    }

    // Check if the user's ID and password were found in the database
    if (mysqli_num_rows($result) == 1) {
        
        $_SESSION['Userfound'] = "1";
        $_SESSION['NID'] = $id;
        header('Location: otp.php');

}
}
?>