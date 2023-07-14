<?php
include('dbconnect.php');

session_start();
include('dbconnect.php');
if(!isset($_SESSION['session_id'])){
    header('Location: index.php');
}
$sessionid = $_SESSION['session_id'];
//get userdata
$querysel = "SELECT * FROM userdata WHERE sessionid = '$sessionid'";
$result = mysqli_query($conn, $querysel);
if (!$result) {
    die('Could not query database: ' . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);
$name = $row['Name'];
$id = $row['ID'];
$usphone = $_SESSION['usphone'];
$category = $_SESSION['category'];
$ovdate = $_SESSION['ovdate'];
$olocation = $_SESSION['olocation'];
$wn = $_SESSION['wn'];
$wr = $_SESSION['wr'];
$tempadd = $_SESSION['tempadd'];


if (isset($_GET['token'])) {
    $token = $_GET['token'];
}

if (isset($_GET['bill_id'])) {
    $bill_id = $_GET['bill_id'];
}

if (isset($_GET['amount'])) {
    $amount = $_GET['amount'];
}

$payload = array(
    "token" => $token,
    "amount" => $amount
);

$headers = array(
    "Authorization" => "key test_secret_key_5598b49d04674fcc9e4488cbb58ce896"
);

$amount = (int) $amount;

$URL = "https://khalti.com/api/v2/payment/verify/";
$headers = [
    "Authorization: Key test_secret_key_5598b49d04674fcc9e4488cbb58ce896",
    "Content-Type: application/json"
];

$payload = json_encode([
    "token" => $token,
    "amount" => $amount
]);

$options = [
    "http" => [
        "header" => implode("\r\n", $headers),
        "method" => "POST",
        "content" => $payload,
        "ignore_errors" => true // Optional: Ignore HTTP errors
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($URL, false, $context);

if ($response !== false) {
    // Request successful
    echo 'Request successful';
    $querynewlicense = "INSERT INTO newlicense (NID, ovdate, office,category, usphone, witnessname, witnessrel, tempaddr ) VALUES ('$id','$ovdate','$olocation','$category','$usphone','$wn','$wr','$tempadd')";
$resultnl = mysqli_query($conn, $querynewlicense);
if($conn->query($querynewlicense)===TRUE){
    echo"New License Registered Successfully";
}

$querynlid = "SELECT nlid FROM newlicense WHERE NID = '$id'";
$resultnlid = mysqli_query($conn, $querynlid);
$row =mysqli_fetch_assoc($resultnlid);
$nlid = $row['nlid'];
$_SESSION['nlid'] =$nlid;


$queryexam = "INSERT INTO exam(NID, ov, we, westat) VALUES('$id','$ovdate',NULL,NULL)";
$resultexam = mysqli_query($conn,$queryexam);

$queryresult = "INSERT INTO trials (ftd,ftr,sctd,str,ttd,ttr,NID) VALUES(NULL,NULL,NULL,NULL,NULL,NULL,'$id')";
$resultexam = mysqli_query($conn,$queryresult);
if (!$resultexam) {
    die('Could not query database: ' . mysqli_error($conn));
}
    

} else {
    // Request failed
    echo 'Request failed';
}


?>