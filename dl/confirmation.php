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
                                Rimisha Shrestha
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="iconamoon:category-thin"></iconify-icon>
                                Address
                            </div>
                            <div class="LicenseInformation__item__value">
                                Lalitpur
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="clarity:date-line"></iconify-icon> Fathers Name
                            </div>
                            <div class="LicenseInformation__item__value">
                                Michael O brien
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="solar:danger-circle-linear"></iconify-icon>
                                Mothers Name
                            </div>
                            <div class="LicenseInformation__item__value">
                                Tina English
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="ph:phone"></iconify-icon>
                                Spouse Name
                            </div>
                            <div class="LicenseInformation__item__value">
                                Michelle Brown
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="ph:phone"></iconify-icon>
                                Office Visit Date
                            </div>
                            <div class="LicenseInformation__item__value">
                                2023-12-01
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="ph:phone"></iconify-icon>
                                Written Exam Date
                            </div>
                            <div class="LicenseInformation__item__value">
                                Michelle Brown
                            </div>
                        </div>
                        <div class="LicenseInformation__item">
                            <div class="LicenseInformation__item__field">
                                <iconify-icon icon="ph:phone"></iconify-icon>
                                office location
                            </div>
                            <div class="LicenseInformation__item__value">
                                Ekantakuna office
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="cBtn cBtn--red">
                <span>Download pdf</span>
            </button>
        </div>
    </section>



    <script src="./js/vendor.js"></script>
    <script src="./js/app.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>

</html>