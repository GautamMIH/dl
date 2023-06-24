<?php
session_start();
include('dbconnect.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user's ID and password from the form
    $id = $_POST['NID'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dl');

    // Check if the connection was successful
    if (!$conn) {
        die('Could not connect to database: ' . mysqli_connect_error());
    }

    // Query the database for the user's ID and password
    $query = "SELECT * FROM userdata WHERE ID='$id' AND pwd='$password'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die('Could not query database: ' . mysqli_error($conn));
    }

    // Check if the user's ID and password were found in the database
    if (mysqli_num_rows($result) == 1) {
        // Generate a session ID and store it in the session
        $session_id = uniqid();
        $session_id .= bin2hex(random_bytes(2));
        $_SESSION['session_id'] = $session_id;

        $querysess= "UPDATE userdata SET sessionid = '$session_id' WHERE ID = '$id'  ";
        $result = mysqli_query($conn, $querysess);

        if (!$result) {
            die('Could not query database: ' . mysqli_error($conn));
        }

        // Redirect the user to the other page
        header('Location: Dashboard.php');
        exit();
    } else {
        // Show a popup saying "Wrong credentials" and redirect back to the original page
        echo '<script>alert("Wrong credentials");</script>';
        header('Location: original_page.php');
        exit();
    }
}
?>