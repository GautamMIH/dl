<?php
session_start();
include('dbconnect.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user's ID and password from the form
    $id = mysqli_real_escape_string($conn,$_POST['NID']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);

    $id = trim($id);
    $phone = trim($phone);

    $sanitizedid = mysqli_real_escape_string($conn,$id);
    $sanitizedphone = mysqli_real_escape_string($conn,$phone);

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dl');

    // Check if the connection was successful
    if (!$conn) {
        die('Could not connect to database: ' . mysqli_connect_error());
    }

    // Query the database for the user's ID and password
    $query = "SELECT * FROM userdata WHERE ID='$sanitizedid' AND phone='$sanitizedphone'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die('Could not query database: ' . mysqli_error($conn));
    }

    // Check if the user's ID and password were found in the database
    if (mysqli_num_rows($result) == 1) {
        
        $_SESSION['Userfound'] = "1";
        $_SESSION['NID'] = $sanitizedid;
        header('Location: otp.php');

}
}
?>