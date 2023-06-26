<?php 
session_start();
if(isset($_SESSION['session_id'])){
  header('Location: Dashboard.php');
}
if(!isset($_SESSION['Userfound'])){
    header('Location: index.php');
  }
include('dbconnect.php');
  $id = $_SESSION['NID'];
  $queryemail = "SELECT email FROM userdata WHERE ID = '$id'";
  $result = mysqli_query($conn, $queryemail);
  $row = mysqli_fetch_assoc($result);
  $email = $row['email'];
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';
  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  

      //if user record is available in database then $count will be equal to 1
                  $otp = rand(100000, 999999); // You can adjust the range as per your requirement
                  $_SESSION['otp'] = $otp;
                  $mail = new PHPMailer(true);

                  try {
                      // SMTP configuration
                      $mail->isSMTP();
                      $mail->Host = 'smtp.office365.com';
                      $mail->SMTPAuth = true;
                      $mail->Username = 'gautam.mudbhari16@outlook.com';
                      $mail->Password = 'q:FH8.<CfK=U+:m@';
                      $mail->SMTPSecure = 'tls';
                      $mail->Port = 587;
  
                      // Email content
                      $mail->setFrom('gautam.mudbhari16@outlook.com', 'EDLS');
                      $mail->addAddress($email, 'User');
                      $mail->Subject = 'OTP Verification';
                      $mail->Body = 'Dear User'.$email.'Please enter the following OTP code to further proceed with your actions on our website. Your OTP is: ' . $otp;
  
                      // Send the email
                      $mail->send();
                      echo 'Email sent successfully.';
                  } catch (Exception $e) {
                      echo 'Failed to send email. Error: ' . $mail->ErrorInfo;
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
      <a href="signUp.php" class="heroSection__brand__link primaryTitle"><img src="./images/gov-logo.png" alt=""></a>
    </div>
    <div class="heroSection__title">
        NEPAL ELECTRONIC DRIVING LICENSE
    </div>

    <div class="wrapper">
      <div class="heroSection__main ">
        <section class="heroSection__main__SignUp ">
              <div class="content">
                <div class="heroSection__main__SignUp__title">
                  <span>License</span><br> Sign-in
                </div>
                <form action="otpverify.php" method="post" class="heroSection__main__SignUp__form">
                  <div class="form-group">
                    <label for="OTP">OTP</label>
                    <input type="text" id="OTP" name="OTP" >
                  </div>
                  <button class="cBtn cBtn--blue">
                    <span>
                      Signin
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
