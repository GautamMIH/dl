<?php 
session_start();
include('dbconnect.php');

if(!isset($_SESSION['session_id'])){
    header('Location: index.php');
}
$sessionid = $_SESSION['session_id'];
?>
<?php 
//get userdata
$westat ="0";
$querysel = "SELECT * FROM userdata WHERE sessionid = '$sessionid'";
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
  <title>web application</title>
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
            <a href="Dashboard.php" class="navbar__menus__item active">
                Dashboard
            </a>
            <a href="newLiscence.php" class="navbar__menus__item">
                <?php echo $content?>
            </a>
            <a href="logout.php" class="navbar__menus__item">
               Log Out
            </a>
        </div>
   </div>

    <section class="afterLoginAndRegistration wrapper">
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

        <ul class="nav nav-tabs afterLoginAndRegistrationTabs" id="afterLoginAndRegistrationTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="liscenceStatus-tab" data-bs-toggle="tab" data-bs-target="#liscenceStatus-tab-pane" type="button" role="tab" aria-controls="liscenceStatus-tab-pane" aria-selected="true">Liscence Status</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="Exam-tab" data-bs-toggle="tab" data-bs-target="#Exam-tab-pane" type="button" role="tab" aria-controls="Exam-tab-pane" aria-selected="false">Exam Status</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="vechicle-tab" data-bs-toggle="tab" data-bs-target="#vechicle-tab-pane" type="button" role="tab" aria-controls="vechicle-tab-pane" aria-selected="false">Vehicle</button>
              </li>
          </ul>
          <div class="tab-content" id="afterLoginAndRegistrationTabbContent">
                            
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
            <div class="tab-pane fade" id="Exam-tab-pane" role="tabpanel" aria-labelledby="Exam-tab" tabindex="0">
            <?php if (mysqli_num_rows($resultexam) == 0){
                    echo"No Scheduled Exams!";
                }?>
                <div class="liscenceStatus__content">
                    <div class="tabbox" <?php echo $displayStyleexam; ?>>
                        <div class="tabbox__header">
                            Important Dates
                        </div>
                        <div class="tabbox__content">
                            <div class="LicenseInformation">
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="clarity:date-line"></iconify-icon> Office Visit Date:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$ov";?>
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="clarity:date-line"></iconify-icon> Written Exam Date:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$we";?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tabbox" <?php echo $displayStyletrial; ?>>
                    <?php 
                                                if($ttr == '0'){
                                                echo"All Trials Failed. Please Contact your registered Office!";}
                                                
                                                ?>
                        <div class="tabbox__header">
                            Trial Information
                        </div>
                        <div class="tabbox__content p-0">
                           <table class="cTable">
                                <thead>
                                    <tr>
                                        <td>Date</td>
                                        <td>Trial Stage</td>
                                        <td>Result</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td><?php echo"$ftd";?></td>
                                        <td>First Trial</td>
                                        <?php 
                                                if($ftr == '1'){
                                                $classfirst = 'class=passed';}
                                                else{
                                                $classfirst = 'class=fail';
                                                }
                                                ?>
                                        <td <?php echo $classfirst; ?>><?php echo"$ftr";?></td>
                                    </tr>
                                    <?php 
                                    if($ftr == '1'){
                                        $displayStylestr = 'style="display: none;"';
                                    }
                                    else{
                                        $displayStylestr = '';
                                    }
                                    ?>
                                    <tr <?php echo $displayStylestr; ?>>
                                        <td><?php echo"$sctd";?></td>
                                        <td>Second Trial</td>
                                        <?php 
                                                if($str == '1'){
                                                $classsecond = 'class=passed';}
                                                else{
                                                $classsecond = 'class=fail';
                                                }
                                                ?>
                                        <td <?php echo $classsecond; ?>><?php echo"$str";?></td>
                                    </tr>
                                    <?php 
                                    if($str == '1'){
                                        $displayStylettr = 'style="display: none;"';
                                    }
                                    else{
                                        $displayStylettr = '';
                                    }
                                    ?>
                                    <tr <?php echo $displayStylettr; ?>>
                                        <td><?php echo"$ttd";?></td>
                                        <td>Third Trial</td>
                                        <?php 
                                                if($ttr == '1'){
                                                $classthird = 'class=passed';}
                                                else{
                                                $classthird = 'class=fail';
                                                }
                                                ?>
                                        <td <?php echo $classthird; ?>><?php echo"$ttr";?></td>
                                    </tr>
                                </tbody>
                           </table>
                       
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade  active  " id="vechicle-tab-pane" role="tabpanel" aria-labelledby="vechicle-tab" tabindex="0">
                <div class="tabbox"<?php echo $displayStylevehicle?>>
                    <div class="tabbox__header">
                        Registered vehicles
                    </div>
                    <div class="tabbox__content">
                        <div class="LicenseInformation">
                            <div class="LicenseInformation__item">
                                <div class="LicenseInformation__item__field">
                                    <iconify-icon icon="solar:card-outline"></iconify-icon>
                                    Vehicle No.:
                                </div>
                                <div class="LicenseInformation__item__value">
                                    <?php echo $vehicleNo?>
                                </div>
                            </div>
                            <div class="LicenseInformation__item">
                                <div class="LicenseInformation__item__field">
                                    <iconify-icon icon="iconamoon:category-thin"></iconify-icon>
                                    Vehicle type:
                                </div>
                                <div class="LicenseInformation__item__value">
                                    <?php echo $vehicletype?>
                                </div>
                            </div>
                            <div class="LicenseInformation__item">
                                <div class="LicenseInformation__item__field">
                                    <iconify-icon icon="clarity:date-line"></iconify-icon>Registered office:
                                </div>
                                <div class="LicenseInformation__item__value">
                                    <?php echo $vehicleoffice?>
                                </div>
                            </div>
                            <div class="LicenseInformation__item">
                                <div class="LicenseInformation__item__field">
                                    <iconify-icon icon="solar:danger-circle-linear"></iconify-icon>
                                    Tax paid until:
                                </div>
                                <div class="LicenseInformation__item__value">
                                    <?php echo $vehicletax?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
          </div>
    </section>


  <script src="./js/vendor.js"></script>
  <script src="./js/app.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>

</html>