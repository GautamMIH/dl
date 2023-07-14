<?php 
session_start();
include('dbconnect.php');

if(!isset($_SESSION['session_adid'])){
    header('Location: index.php');
}

$pos = $_SESSION['pos'];
if($pos == "admin"|| $pos=="traffic"){}else{
    header('Location: Licensesearch.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NID = $_POST['NID'];
  }
?>
<?php 
//get userdata
$westat ="0";
$querysel = "SELECT * FROM userdata WHERE ID = '$NID'";
$result = mysqli_query($conn, $querysel);
if (!$result) {
    die('Could not query database: ' . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);
$name = $row['Name'];
$id = $row['ID'];

//get license data associated with the user
$querydl = "SELECT * FROM license WHERE NID = '$id'";
$result = mysqli_query($conn, $querydl);
if (mysqli_num_rows($result) == 0){
    $displayStyle = 'style="display: none;"';
    $content = 'New License';
}
else{
$displayStyle = '';
$row = mysqli_fetch_assoc($result);
$dlno = $row['DL_no'];
$category = $row['category'];
$expiry = $row['expiry'];
$felony = $row['felony'];
$contact = $row['contact'];
$content = 'Add Category';
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

if($westat == "1"){
    $querytrial = "SELECT * FROM trials WHERE NID = '$id'";
    $resulttrial = mysqli_query($conn, $querytrial);
    if(mysqli_num_rows($resulttrial)==0){
        $displayStyletrial = 'style="display: none;"';
    }
    else{
        $displayStyletrial = '';
        $row = mysqli_fetch_assoc($resulttrial);
        $trid = $row['trid'];
        $ftd = $row['ftd'];
        $ftr = $row['ftr'];
        $sctd = $row['sctd'];
        $str = $row['str'];
        $ttr = $row['ttr'];
        $ttd = $row['ttd'];

    }
}
else{
    $displayStyletrial = 'style="display: none;"';
}

//get the registered vehicles associated with the user NID
$queryvehicle = "SELECT * FROM vehicle WHERE NID = '$id'";
$resultvehicle = mysqli_query($conn, $queryvehicle);
if(mysqli_num_rows($resultvehicle)==0){
    $displayStylevehicle ='style="display:none;"';
}
else{
    $displayStylevehicle ='';
    $row = mysqli_fetch_assoc($resultvehicle);
    $vehicleNo = $row['vehicle_no'];
    $vehicletype = $row['vehicle_type'];
    $vehicleoffice = $row['vehicle_office'];
    $vehicletax = $row['vehicle_tax'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <title>License Administration</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="title" content="NEEF" />
  <meta name="description" content="write company description " />
  <meta name="robots" content="index, follow" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="English" />
  <!-- favicon--------------------------------------- -->
  <link rel="icon" href="" type="image/gif" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <!-- custom css------------------------------------- -->
  <link rel="stylesheet" href="./css/main.css" />
  <!-- poppins font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
<div class="navbar wrapper">
        <div class="navbar__logo">
            <img src="./images/gov-logo.png" alt="" class="navbar__logo__img">
            NEPAL ELECTRONIC <br>DRIVING LISCENCE
        </div>
        <div class="navbar__menus">
            <a href="adminNewApplicants.php" class="navbar__menus__item ">
                Applicant Search
            </a>
            <a href="Licensesearch.php" class="navbar__menus__item active">
                License Search
            </a>
            <a href="updatefelony.php" class="navbar__menus__item">
                Felony
            </a>
            <a href="adminUpdate.php" class="navbar__menus__item">
                Update
            </a>
            <a href="logout.php" class="navbar__menus__item">
               Log Out
            </a>
        </div>
   </div>
   <div class="afterLoginAndRegistration__header">
            <img src="./images/images.jpg" alt="" class="afterLoginAndRegistration__header__passportImg">
            <div class="afterLoginAndRegistration__header__personid">
                <div class="afterLoginAndRegistration__header__personid__name">
                    <?php echo"$name";?>
                </div>
                <div class="afterLoginAndRegistration__header__personid__liscenceNo">
                    <strong>NID NO.:</strong> <?php echo"$id";?>
                </div>
            </div>
        </div>
   <div class="tab-pane fade show active"  id="liscenceStatus-tab-pane" role="tabpanel" aria-labelledby="liscenceStatus-tab" tabindex="0">
            <?php if (mysqli_num_rows($result) == 0){
                    echo"No License Found. Please apply for a new License!";
                }?>
                    <div class="tabbox" <?php echo $displayStyle; ?>>
                        <div class="tabbox__header">
                            License Information
                        </div>
                        <div class="tabbox__content">
                            <div class="LicenseInformation">
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="solar:card-outline"></iconify-icon>
                                        Driver Liscence No.:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$dlno";?>
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="iconamoon:category-thin"></iconify-icon>
                                        Category:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$category";?>
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="clarity:date-line"></iconify-icon> Expiry Date:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$expiry";?>
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="solar:danger-circle-linear"></iconify-icon>
                                        Felony:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$felony";?>
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="ph:phone"></iconify-icon>
                                        Contact No:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$contact";?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

    
</body>
</html>