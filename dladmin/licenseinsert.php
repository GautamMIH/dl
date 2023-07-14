<?php 
session_start();
include('dbconnect.php');
if(!isset($_SESSION['session_adid'])){
  header('Location: admin.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NID = $_POST['NID'];
  }
  else{
    header('Location: adminNewApplicants.php');
  }
   //get userdata
$querysel = "SELECT * FROM userdata WHERE ID = '$NID'";
$result = mysqli_query($conn, $querysel);
if (!$result) {
    die('Could not query database: ' . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);
$name = $row['Name'];
$id = $row['ID'];

$pos = $_SESSION['pos'];
if($pos == "admin"){}else{
    header('Location: Licensesearch.php');
}


//get the exam status associated with the user NID
$queryexam = "SELECT * FROM exam WHERE NID= '$id'";
$resultexam = mysqli_query($conn, $queryexam);
if(mysqli_num_rows($resultexam)==0){
    $displayStyleexam = 'style="display: none;"';
}
else{
    $displayStyleexam = '';
    $row =mysqli_fetch_assoc($resultexam);
    $Exid = $row['Exid'];
    $ov = $row['ov'];
    $we = $row['we'];
    $westat = $row['westat'];
}

//GET NEW LICENSE DATA ASSOCIATED WITH USER
$querynlid = "SELECT * FROM newlicense WHERE NID = '$NID' ";
                    $result = mysqli_query($conn, $querynlid);

                    if(!$result){die('Could not query database: ' . mysqli_error($conn));}

                   
                   if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $nlid = $row['nlid'];
                    $NID = $row['NID'];
                    $category = $row['category'];
                    $phone = $row['usphone'];
                    $address = $row['tempaddr'];
                    $ol = $row['office'];
                    $witnessname = $row['witnessname'];
                    $witnessrel = $row['witnessrel'];

                    $queryuser = "SELECT * FROM userdata WHERE ID = '$NID'";
                    $result = mysqli_query($conn, $queryuser);
                    if(!$result){die('Could not query database: ' . mysqli_error($conn));}
                    if (mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['Name'];
                        $email = $row['email'];

                    }

                   }
//GET EXISTING LICENSE STATUS
$querydl = "SELECT * FROM license WHERE NID = '$id'";
$result = mysqli_query($conn, $querydl);
if (mysqli_num_rows($result) == 1){
$queryconcat = "UPDATE license
SET category = CONCAT(category, ',$category')
WHERE NID = '$NID';";
$result = mysqli_query($conn,$queryconcat);

header('Location: admin.php');
}









$currentDate = date('Y-m-d');
$futureDate = date('Y-m-d', strtotime('+5 years', strtotime($currentDate)));
 
echo $currentDate;
echo $futureDate;
$queryinsert = "INSERT INTO license(NID,DL_no,category,expiry,felony,contact,witness,witnessrel,address,office,DOI)
VALUES('$NID','$nlid','$category','$futureDate','0','$phone','$witnessname','$witnessrel','$address','$ol','$currentDate')";

$result = mysqli_query($conn, $queryinsert);
if (!$result) {
    die('Could not query database: ' . mysqli_error($conn));
}

$querynewlicensedelete = "DELETE FROM newlicense WHERE NID = '$NID'";
$result = mysqli_query($conn, $querynewlicensedelete);

$querynewlicensedelete = "DELETE FROM exam WHERE NID = '$NID'";
$result = mysqli_query($conn, $querynewlicensedelete);

$querynewlicensedelete = "DELETE FROM trials WHERE NID = '$NID'";
$result = mysqli_query($conn, $querynewlicensedelete);


header('Location: admin.php');
?>
