<?php 
session_start();
include('dbconnect.php');
if(!isset($_SESSION['session_id'])){
    header('Location: index.php');
}

if (isset($_GET['id'])) {
    $pid = $_GET['id'];
    // Use the $PID variable as needed in your code
}

if(!isset($_SESSION['session_id'])){
    header('Location: index.php');
}
$sessionid = $_SESSION['session_id'];
?>
<?php 
//get userdata
$querysel = "SELECT * FROM userdata WHERE sessionid = '$sessionid'";
$result = mysqli_query($conn, $querysel);
if (!$result) {
    die('Could not query database: ' . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);
$id = $row['ID'];

$usphone = $_SESSION['usphone'];
$category = $_SESSION['category'];
$ovdate = $_SESSION['ovdate'];
$olocation = $_SESSION['olocation'];
$wn = $_SESSION['wn'];
$wr = $_SESSION['wr'];
$tempadd = $_SESSION['tempadd'];


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


$queryexam = "INSERT INTO exam(NID, ov, we, westat) VALUES('$id','$ovdate','null','0')";
$resultexam = mysqli_query($conn,$queryexam);
 
header('Location: generate_pdf.php');




?>