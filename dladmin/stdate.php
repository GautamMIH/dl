
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
if($we==""){
    $action = 'action="wedate.php"';
}
elseif($we!=""){
    if($westat == "1"){
        $action = 'action="ftdate.php"';
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
                if($ftr=="0"){
                    $action = 'action="stdate.php"';
                    if($sctd!=""){
                        $action = 'action="sts.php"';
                        if($str=="0"){
                            $action = 'action="ttdate.php"';
                            if($ttd!=""){
                                $action = 'action="tts.php"';
                                if($ttr == "0"){
                                    $action = 'action="deletelicense.php"';
                                }elseif($ttr=="1"){
                                    $action = 'action="createlicense.php"';
                                }
                            }
                        }elseif($str=="1"){
                            $action = 'action="createlicense.php"';
                        }
                    }
                }elseif($ftr=="1")
                {
                    $action = 'action="createlicense.php"';
                }
            }
    
        }
    }
    else{
        $displayStyletrial = 'style="display: none;"';
        $action = 'action="westatus.php"';
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
   <div class="navbar wrapper">
        <div class="navbar__logo">
            <img src="./images/gov-logo.png" alt="" class="navbar__logo__img">
            NEPAL ELECTRONIC <br>DRIVING LISCENCE
        </div>
        <div class="navbar__menus">
            <a href="adminNewApplicants.php" class="navbar__menus__item ">
                Applicant Search
            </a>
            <a href="adminUpdate.php" class="navbar__menus__item ">
                Update
            </a>
            <a href="logout.php" class="navbar__menus__item">
               Log Out
            </a>
        </div>
   </div>

   <section class="adminpanel wrapper liscenceAdministration">
        <h3 class="newLiscence__header">
            License Administration
        </h3>
        <div class="tabbox">
            <div class="cTable__relative">
                <form action = "stdateinsert.php" method = "POST" >
                <table class="cTable liscenceAdministration__table">
                    <thead>
                        <tr>
                            <td rowspan="2">Liscence ID</td>
                            <td rowspan="2" >Full Name</td>
                            <td rowspan="2">Second Trial Date</td>
                            <td  rowspan="2">Category</td>
                            <td rowspan="2" >Actions</td>
                        </tr>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $nlid ?></td>
                            <td><?php echo $name?> </td>
                            <td><input type="date" name ="stdate"></td>
                            <td><?php echo $category?></td>
                            <td>
                                <input type="hidden" name="NID" value ="<?php echo $NID?>">
                            <button class="cBtn cBtn--blue" type="submit" ><span>UPDATE</span></button>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                </form>
            </div>
        </div>
   </section>


  <script src="./js/vendor.js"></script>
  <script src="./js/app.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>

</html>
