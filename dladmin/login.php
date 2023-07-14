<?php
session_start();
include('dbconnect.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user's ID and password from the form
    $id = $_POST['ADID'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'dl');

    // Check if the connection was successful
    if (!$conn) {
        die('Could not connect to database: ' . mysqli_connect_error());
    }

    // Query the database for the user's ID and password
    $query = "SELECT * FROM admin WHERE adid='$id' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die('Could not query database: ' . mysqli_error($conn));
    }

    // Check if the user's ID and password were found in the database
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $role = $row['pos'];
        $office = $row['office'];

        
        $_SESSION['adminfound'] = "1";
        $_SESSION['ADID'] = $id;
        $_SESSION['pos'] = $role;
        $_SESSION['office'] = $office;

        

        $session_id = uniqid();
        $session_id .= bin2hex(random_bytes(2));


        $input = $session_id;
        $blockSize = 64; // Block size in bytes
        $rounds = 10; // Number of rounds
        
        $inputLength = strlen($input);
        
        // Pad the input to match the block size
        $paddingLength = $blockSize - ($inputLength % $blockSize);
        $paddedInput = str_pad($input, $inputLength + $paddingLength, "\0");
        
        // Split the padded input into blocks
        $blocks = str_split($paddedInput, $blockSize);
        
        // Initial hash value
        $hash = str_repeat("\0", $blockSize);
        
        // Perform the rounds
        for ($i = 0; $i < $rounds; $i++) {
            foreach ($blocks as $block) {
                // XOR the block with the current hash value
                $xorResult = '';
                $length = strlen($block);
                for ($j = 0; $j < $length; $j++) {
                    $xorResult .= $block[$j] ^ $hash[$j];
                }
                $block = $xorResult;
        
                // Perform some custom operations on the block
                $block = strrev($block);
        
                // Update the hash value
                $xorResult = '';
                $length = strlen($hash);
                for ($j = 0; $j < $length; $j++) {
                    $xorResult .= $hash[$j] ^ $block[$j];
                }
                $hash = $xorResult;
        
                // Rotate the hash to the right
                $rotation = 5;
                $rotatedHash = '';
                for ($k = 0; $k < $length; $k++) {
                    $rotatedHash .= $hash[($k - $rotation + $length) % $length];
                }
                $hash = $rotatedHash;
            }
        
            //Reverse the hash
            $hash = strrev($hash);
        }
        
        // Return the final hash as a hexadecimal string
        $hashedPassword = bin2hex($hash);
        $fhash = md5($hashedPassword);
        $finalhash = hash('sha256',$fhash);

        
        $_SESSION['session_adid'] = $finalhash;
   
        $querysess= "UPDATE admin SET sessionid = '$finalhash' WHERE adid = '$id'  ";
        $result = mysqli_query($conn, $querysess);
   
        if (!$result) {
            die('Could not query database: ' . mysqli_error($conn));
        }
        header('Location: adminNewApplicants.php');
}
else{
    echo"Wrong Credentials!";


}
}
?>