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
$querysel = "SELECT * FROM userdata WHERE ID = '$NID'";
$result = mysqli_query($conn, $querysel);
if (!$result) {
    die('Could not query database: ' . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);
$name = $row['Name'];
$id = $row['ID'];



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
        <div class="tab-pane fade show active"  id="liscenceStatus-tab-pane" role="tabpanel" aria-labelledby="liscenceStatus-tab" tabindex="0">
                    <div class="tabbox" >
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
                                    <?php echo"$nlid";?>
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
                                        <iconify-icon icon="iconamoon:category-thin"></iconify-icon>
                                        Blood Group:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$category";?>
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="ph:phone"></iconify-icon>
                                        Phone No:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$phone";?>
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="ph:phone"></iconify-icon>
                                        Address:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$address";?>
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="ph:phone"></iconify-icon>
                                        Office:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$ol";?>
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="ph:phone"></iconify-icon>
                                        Witness:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$witnessname";?>
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="ph:phone"></iconify-icon>
                                        Witness Relation:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                    <?php echo"$witnessrel";?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                  
        </div>
        <form action="licenseinsert.php" method="POST" class="center">
                        <input type="hidden" name = "NID" value="<?php echo $NID?>">
                        <button class="cBtn cBtn--blue" type="submit" ><span>CREATE LICENSE</span></button>
                    </form> 
        


    </section>


  <script src="./js/vendor.js"></script>
  <script src="./js/app.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>

</html>