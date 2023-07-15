<?php 
session_start();
include('dbconnect.php');
if(!isset($_SESSION['session_adid'])){
  header('Location: admin.php');
}

$pos = $_SESSION['pos'];
if($pos == "admin"){}else{
    header('Location: Licensesearch.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NID = $_POST['NID'];
  }
  else{
    header('Location: adminNewApplicants.php');
  }
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

$displayStyletrial = 'style="display: none;"';
if($we==""){
    $action = 'action="wedate.php"';
    $text = 'Assign Written Exam Date';
}
elseif($we!=""){
    if($westat == "1"){
        $action = 'action="ftdate.php"';
        $text = 'Assign First Trial Date';
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

            if($ftd!=""){
                $action = 'action="fts.php"';
                $text = 'Assign First Trial Status';
                if($ftr=="0"){
                    $displayStylestr = '';
                    $action = 'action="stdate.php"';
                    $text = 'Assign Second Trial Date';
                    if($sctd!=""){
                        $action = 'action="sts.php"';
                        $text = 'Assign Second Trial Status';
                        if($str=="0"){
                            $displayStylettr = 'style="';
                            $action = 'action="ttdate.php"';
                            $text = 'Assign Third Trial Date';
                            if($ttd!=""){
                                $action = 'action="tts.php"';
                                $text = 'Assign Third Trial Status';
                                if($ttr == "0"){
                                    $action = 'action="deletelicense.php"';
                                    $text = 'Delete License';
                                }elseif($ttr=="1"){
                                    $action = 'action="createlicense.php"';
                                    $text = 'Create License';
                                }
                            }
                        }elseif($str=="1"){
                            $displayStylettr = 'style="display: none;"';
                            $action = 'action="createlicense.php"';
                            $text = 'Create License';
                        }
                    }
                }elseif($ftr=="1")
                {
                    $displayStylestr = 'style="display: none;"';
                    $action = 'action="createlicense.php"';
                    $text = 'Create License';
                }
            }
    
        }
    }
    else{
        $displayStyletrial = 'style="display: none;"';
        $action = 'action="westatus.php"';
        $text = 'Assign Written Exam Status';
    }
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
<?php echo $role?>
   <div class="navbar wrapper">
        <div class="navbar__logo">
            <img src="./images/gov-logo.png" alt="" class="navbar__logo__img">
            NEPAL ELECTRONIC <br>DRIVING LISCENCE
        </div>
        <div class="navbar__menus">
        <a href="allnewapplicants.php" class="navbar__menus__item ">
                All Applicants
            </a>
            <a href="adminNewApplicants.php" class="navbar__menus__item">
                Applicant Search
            </a>
            <a href="Licensesearch.php" class="navbar__menus__item">
                License Search
            </a>
            <a href="updatefelony.php" class="navbar__menus__item">
                Felony
            </a>

            <a href="adminUpdate.php" class="navbar__menus__item active">
                Update
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
                    <?php echo $name?>
                </div>
                <div class="afterLoginAndRegistration__header__personid__liscenceNo">
                    <strong>NID No.:</strong> <?php echo $NID?>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs afterLoginAndRegistrationTabs" id="afterLoginAndRegistrationTab" role="tablist">
        <li class="nav-item" role="presentation">
              <button class="nav-link" id="Exam-tab" data-bs-toggle="tab" data-bs-target="#Exam-tab-pane" type="button" role="tab" aria-controls="Exam-tab-pane" aria-selected="true">License Administration</button>
            </li>

          
        </ul>
        <div class="tab-content" id="afterLoginAndRegistrationTabbContent">
        <div class="tab-pane fade show active " id="Exam-tab-pane" role="tabpanel" aria-labelledby="Exam-tab" tabindex="0">
            <div class="liscenceStatus__content">
                <div class="tabbox">
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
                                <?php echo $ov ?>
                                </div>
                            </div>
                            <div class="LicenseInformation__item">
                                <div class="LicenseInformation__item__field">
                                    <iconify-icon icon="clarity:date-line"></iconify-icon> Written Exam Date:
                                </div>
                                <div class="LicenseInformation__item__value">
                                <?php echo $we ?>
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
                                                $classfirst = 'class=passed';
                                                $textresult = "pass";}
                                                else{
                                                $classfirst = 'class=fail';
                                                $textresult = "pass";

                                                }
                                                ?>
                                        <td <?php echo $classfirst; ?>><?php echo"$ftr";?></td>
                                    </tr>
                                    <?php 
                                    if($ftr == '1'){
                                        $displayStylestr = 'style="display: none;"';
                                        $displayStylettr = 'style="display: none;"';
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
                                    if($str == '1'|| $ftr =="1"){
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
                                                $classthird = 'class=passed';
                                                $textresult = "pass";}
                                                else{
                                                $classthird = 'class=fail';
                                                $textresult = "fail";
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
        <div class="tab-pane fade show active  " id="liscenceStatus-tab-pane" role="tabpanel" aria-labelledby="liscenceStatus-tab" tabindex="0">
            <div class="tabbox">
                <div class="tabbox__header">
                    Update Details
                </div>
                <div class="tabbox__content">
                    <form class="userInputInfoForm cForm " <?php echo $action?> method="POST">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" value="<?php echo $name?>" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="Phone">Phone Number</label>
                            <input type="text" id="Phone" value="<?php echo $phone ?>" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="ofd">Office Visit Date</label>
                            <input type="date" id="ofd" value="<?php echo $ov ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ofd">Office location</label>
                            <input type="text" id="ofl" value="<?php echo $ol?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ofd">Witness Name</label>
                            <input type="text" id="wtn" value="<?php echo $witnessname?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ofd">Witness Relation</label>
                            <input type="text" id="wtr" value="<?php echo $witnessrel?>" readonly>
                        </div>
                        <input type="hidden" name = "NID" value="<?php echo $NID?>">

                        <button class="cBtn cBtn--blue" type="submit" ><span><?php echo $text?></span></button>
                    </form>
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