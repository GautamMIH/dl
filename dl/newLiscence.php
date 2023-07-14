<?php 
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
$address = $row['Address'];
$Fname = $row['FName'];
$Mname = $row['MName'];
$phone = $row['phone'];
$id = $row['ID'];

//get license data associated with the user
$querydl = "SELECT * FROM license WHERE NID = '$id'";
$result = mysqli_query($conn, $querydl);
if (mysqli_num_rows($result) == 0){
    $content = 'New License';
}
else{
    $content = 'Add Category';
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <title>License Application</title>
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

    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->

   <div class="navbar wrapper">
        <div class="navbar__logo">
            <img src="./images/gov-logo.png" alt="" class="navbar__logo__img">
            NEPAL ELECTRONIC <br>DRIVING LISCENCE
        </div>
        <div class="navbar__menus">
            <a href="Dashboard.php" class="navbar__menus__item ">
                Dashboard
            </a>
            <a href="newLiscence.php" class="navbar__menus__item active">
                <?php echo $content ?>
            </a>
            <a href="logout.php" class="navbar__menus__item">
               Log Out
            </a>
        </div>
   </div>

    <section class="newLiscence wrapper">
        <h3 class="newLiscence__header">
            Applicant Registration
        </h3>
        <div class="note">
            Note: Personal data is non modifiable. Other extra data can be added manually.
        </div>
        <div class="tabbox">
            <div class="tabbox__header">
                 Personal Information
            </div>
            <div class="tabbox__content">
                <div class="newLiscence__form cForm">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" id="Name" value="<?php echo $name?>" readonly >
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" id="Address" value="<?php echo $address?>" readonly >
                    </div>
                    <div class="form-group">
                        <label for="FathersName">Fathers Name</label>
                        <input type="text" id="FathersName" value="<?php echo $Fname?>" readonly >
                    </div>
                    <div class="form-group">
                        <label for="MothersName">Mothers Name</label>
                        <input type="text" id="MothersName" value="<?php echo $Mname?>" readonly >
                    </div>
                </div>
            </div>
        </div>
       
        <div class="tabbox">
            <div class="tabbox__header">
                User Information
            </div>
            <div class="tabbox__content">
                <form class="userInputInfoForm cForm " method ="POST" action = "confirmation.php" id="newlicenseform">
                    <div class="form-group">
                        <label for="Phone">Phone Number</label>
                        <input type="number" name = "Phone"id="Phone" value="<?php echo $phone?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="Category">Category</label>
                        <select name="category" id="Category">
                            <option value="A">A-Motorcycle, Scooter, Moped</option>
                            <option value="B">B-Car, Jeep, Delivery Van</option>
                            <option value="C">C-Tempo, Auto Rickshaw</option>
                            <option value="D">D-Power Tiller</option>
                            <option value="E">E-Tractor</option>
                            <option value="F">F-Minibus, Minitruck</option>
                            <option value="G">G-Truck, Bus, Lorry</option>
                            <option value="H">H-RoadRoller, Dozer</option>
                            <option value="I">I-Crane, Firebrigade, Loader</option>
                            <option value="J">J-Excavator, Backhoe Loader, Other</option>
                            <option value="K">K-Scooter, Moped</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ofd">Office Visit Date</label>
                        <input type="date" id="date" name = "date" >
                    </div>
                    <!-- <div class="form-group">
                        <label for="ofd">writtenDate</label>
                        <input type="date" id="ofd" value="2023-01-12">
                    </div> -->
                    <div class="form-group">
                        <label for="ol">Office location</label>
                        <select name="offlocation" id="ol">
                            <option value="Ktm">kathmandu</option>
                            <option value="Chbl">chabhail</option>
                            <option value="thbryg">thulobharyang</option>
                            <option value="rr">Radhe Radhe</option>
                            <option value="btr">Biratnagar</option>
                            <option value="pkr">Pokhara</option>
                            <option value="klk">kalanki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="wtn">Witness Name</label>
                        <input type="text" id="witnessname" name = "wtn">
                    </div>
                    <div class="form-group">
                        <label for="wtr">Witness Relationship</label>
                        <select name="wtnsrl" id="wtnsrl">
                            <option value="father">Father</option>
                            <option value="mother">Mother</option>
                            <option value="3">Spouse</option>
                        </select>
                    </div> 
                        <div class="form-group">
                        <label for="tempadd">Temporary Address</label>
                        <input type="text" id="tempadd"  name = "tempadd">
                    </div>
                    <button class="cBtn cBtn--blue" type="submit"><span>save</span></button>
                </form>
            </div>
        </div>

        
    </section>


  <script src="./js/vendor.js"></script>
  <script src="./js/app.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>

</html>

