<?php
session_start();
if(isset($_SESSION['session_adid'])){
  header('Location: adminNewApplicants.php');
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


  <section class="heroSection  ">
    <div class="heroSection__brand">
      <a href="signUp.html" class="heroSection__brand__link primaryTitle"><img src="./images/gov-logo.png" alt=""></a>
    </div>
    <div class="heroSection__title">
        NEPAL ELECTRONIC DRIVING LISCENCE
    </div>

    <div class="wrapper">
      <div class="heroSection__main ">
        <section class="heroSection__main__SignUp ">
              <div class="content">
                <div class="heroSection__main__SignUp__title">
                  <span>Admin</span><br> Login
                </div>
                <form action="login.php" method ="POST" class="heroSection__main__SignUp__form">
                  <div class="form-group">
                    <label for="NID">Username</label>
                    <input type="text" id="ADID" name="ADID" placeholder="123-45-545-23423">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="password">
                  </div>
                  <button class="cBtn cBtn--blue">

                    <span>
                      Log In
                    </span>
                    </button>
                </form>
              </div>
        </section>
        <div class="heroSection__main__formImg">
          <img src="./images/fudo-jahic-Dhoxh0Z7aSI-unsplash.jpg" alt="">
        </div>
      </div>
    </div>
  </section>


  <script src="./js/vendor.js"></script>
  <script src="./js/app.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>

</html>