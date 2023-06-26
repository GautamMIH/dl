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
$querysel = "SELECT * FROM userdata WHERE sessionid = '$sessionid'";
$result = mysqli_query($conn, $querysel);
if (!$result) {
    die('Could not query database: ' . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);
$name = $row['Name'];
$id = $row['ID'];
$fname = $row['FName'];
$mname = $row['MName'];


    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $usphone = $_POST['Phone'];
        $category = $_POST['category'];
        $ovdate = $_POST['date'];
        $olocation = $_POST['offlocation'];
        $wn = $_POST['wtn'];
        $wr = $_POST['wtnsrl'];
        $tempadd = $_POST['tempadd'];
    
        $_SESSION['usphone'] = $usphone;
        $_SESSION['category'] = $category;
        $_SESSION['ovdate'] = $ovdate;
        $_SESSION['olocation'] = $olocation;
        $_SESSION['wn'] = $wn;
        $_SESSION['wr'] = $wr;
        $_SESSION['tempadd'] = $tempadd;

        $querycategory = "SELECT *
        FROM license
        WHERE category LIKE '%".$category."%' AND NID = '$id'" ;
        $resultcategory = mysqli_query($conn, $querycategory);
        $row = mysqli_fetch_assoc($resultcategory);
        if(mysqli_num_rows($resultcategory)>0){
            $categoryuser = $row['category'];
        if($categoryuser == $category){
            $message = "Category already exists!";
            echo "<script>alert('$message');
            window.location.href = 'newLiscence.php'</script>";

        }

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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
  

    <div class="navbar wrapper">
        <div class="navbar__logo">
            <img src="./images/gov-logo.png" alt="" class="navbar__logo__img">
            NEPAL ELECTRONIC <br>DRIVING LICENSE
        </div>
        <div class="navbar__menus">
            <a href="Dashboard.php" class="navbar__menus__item ">
                Dashboard
            </a>
            <a href="newLiscence.php" class="navbar__menus__item active">
                New License
            </a>
            <a href="logout.php" class="navbar__menus__item">
                Log Out
            </a>
        </div>
    </div>

    <section class="confirmPage wrapper">
        <div class="confirmPage__content">
            <h3 class="newLiscence__header">
                confimration
            </h3>
            <form action ="payment.php" method = "POST">
            <div class="tabbox">
                <div class="tabbox__header">
                    Preview 
                </div>
                <div class="tabbox__content">
                    <div class="LicenseInformation">
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="solar:card-outline"></iconify-icon>
                                Name
                            </div>
                            <div class="LicenseInformation__item__value">
                                <?php echo $name?>
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="iconamoon:category-thin"></iconify-icon>
                                Address
                            </div>
                            <div class="LicenseInformation__item__value">
                            <?php echo $tempadd?>
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="clarity:date-line"></iconify-icon> Fathers Name
                            </div>
                            <div class="LicenseInformation__item__value">
                            <?php echo $fname?>
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="solar:danger-circle-linear"></iconify-icon>
                                Mothers Name
                            </div>
                            <div class="LicenseInformation__item__value">
                            <?php echo $mname?>
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="solar:danger-circle-linear"></iconify-icon>
                                Category
                            </div>
                            <div class="LicenseInformation__item__value">
                            <?php echo $category?>
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="ph:phone"></iconify-icon>
                                Witness Name
                            </div>
                            <div class="LicenseInformation__item__value">
                            <?php echo $wn?>
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="ph:phone"></iconify-icon>
                                Witness Relation
                            </div>
                            <div class="LicenseInformation__item__value">
                            <?php echo $wr?>
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="ph:phone"></iconify-icon>
                                Office Visit Date
                            </div>
                            <div class="LicenseInformation__item__value">
                            <?php echo $ovdate?>
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="ph:phone"></iconify-icon>
                                Office location
                            </div>
                            <div class="LicenseInformation__item__value">
                            <?php echo $olocation?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="cBtn cBtn--red" type="submit">
                <span>Pay and Download pdf</span>
            </button>
            </form> 
        </div>
    </section>



    <script src="./js/vendor.js"></script>
    <script src="./js/app.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>

</html>