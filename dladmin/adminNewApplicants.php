<?php 
session_start();
if(!isset($_SESSION['session_adid'])){
    header('Location: admin.php');
  }
  include('dbconnect.php');
  
  $pos = $_SESSION['pos'];
  if($pos == "admin"){}else{
      header('Location: Licensesearch.php');
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
            <a href="adminNewApplicants.php" class="navbar__menus__item active">
                Applicant Search
            </a>
            <a href="Licensesearch.php" class="navbar__menus__item">
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

   <section class="adminpanel wrapper">
        <h3 class="newLiscence__header">
            New Applicants
        </h3>
        <div class="tabbox">
            <div class="adminpanel__searchForm">
                <form action="" method ="POST" class="cForm">
                    <div class="form-group">
                        <label for="liscenceid">Search NLID</label>
                        <div class="adminpanel__searchForm__btn">
                            <input type="number" id="liscenceid" name="liscenceid">
                            <button class="cForm__searchBtn" type="submit"><iconify-icon icon="material-symbols:search"></iconify-icon></button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="cTable__relative">
                <form action="adminUpdate.php" method="POST">
                <table class="cTable">
                    <thead>

                        <tr>
                            <td>Liscence ID</td>
                            <td>Full Name</td>
                            <td>Mobile number</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>Category</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nlid = $_POST['liscenceid'];
                    $querynlid = "SELECT * FROM newlicense WHERE nlid = '$nlid' ";
                    $result = mysqli_query($conn, $querynlid);

                    if(!$result){die('Could not query database: ' . mysqli_error($conn));}

                   
                   if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $nlid = $row['nlid'];
                    $NID = $row['NID'];
                    $category = $row['category'];
                    $phone = $row['usphone'];
                    $address = $row['tempaddr'];

                    $queryuser = "SELECT * FROM userdata WHERE ID = '$NID'";
                    $result = mysqli_query($conn, $queryuser);
                    if(!$result){die('Could not query database: ' . mysqli_error($conn));}
                    if (mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_assoc($result);
                        $name = $row['Name'];
                        $email = $row['email'];
                        

                        echo"<td><input type='hidden' id='NID' name='NID' value='$NID'><input type='text' id='NLID' value=' $nlid' readonly ></td>
                        <td><input type='text' id='Name' value=' $name' readonly ></td>
                        <input type='hidden' id='phone' name='Phone' value=' $phone' readonly >
                        <td><input type='text' id='phone' name='Phone' value=' $phone' readonly ></td>
                        <td><input type='text' id='Email' value=' $email' readonly ></td>
                        <td><input type='text' id='Address' value=' $address' readonly ></td>
                        <td><input type='text' id='Category' value=' $category' readonly ></td> 
                        <td><button class='cBtn cBtn--blue' type='submit'><span>View</span></button></td></tr>";

                    }

                   }
                }

                ?>
                        
                       
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