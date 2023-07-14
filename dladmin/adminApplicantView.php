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
            <a href="Dashboard.html" class="navbar__menus__item active">
                Dashboard
            </a>
            <a href="newLiscence.html" class="navbar__menus__item">
                New Liscence
            </a>
            <a href="index.html" class="navbar__menus__item">
               Log Out
            </a>
        </div>
   </div>

    <section class="afterLoginAndRegistration wrapper">
        <div class="afterLoginAndRegistration__header">
            <img src="./images/images.jpg" alt="" class="afterLoginAndRegistration__header__passportImg">
            <div class="afterLoginAndRegistration__header__personid">
                <div class="afterLoginAndRegistration__header__personid__name">
                    Bishal Pahari
                </div>
                <div class="afterLoginAndRegistration__header__personid__liscenceNo">
                    <strong>Citizenship No.:</strong> 45-01-75-03332
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
          </ul>
          <div class="tab-content" id="afterLoginAndRegistrationTabbContent">
            <div class="tab-pane fade show active  " id="liscenceStatus-tab-pane" role="tabpanel" aria-labelledby="liscenceStatus-tab" tabindex="0">
                    <div class="tabbox">
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
                                        01-08-00987821
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="iconamoon:category-thin"></iconify-icon>
                                        Category:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                        A
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="clarity:date-line"></iconify-icon> Expiry Date:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                        2078-8-15
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="solar:danger-circle-linear"></iconify-icon>
                                        Felony:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                        Yes
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="ph:phone"></iconify-icon>
                                        Contact No:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                        9861667778
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="tab-pane fade" id="Exam-tab-pane" role="tabpanel" aria-labelledby="Exam-tab" tabindex="0">
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
                                        2078-8-15
                                    </div>
                                </div>
                                <div class="LicenseInformation__item">
                                    <div class="LicenseInformation__item__field">
                                        <iconify-icon icon="clarity:date-line"></iconify-icon> Written Exam Date:
                                    </div>
                                    <div class="LicenseInformation__item__value">
                                        2078-8-16
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tabbox">
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
                                        <td>2022-05-08</td>
                                        <td>First Trial</td>
                                        <td class="fail">Fail</td>
                                    </tr>
                                    <tr>
                                        <td>2022-06-01</td>
                                        <td>Second Trial</td>
                                        <td class="fail">Fail</td>
                                    </tr>
                                    <tr>
                                        <td>2022-07-07</td>
                                        <td>Third Trial</td>
                                        <td class="passed">Passed</td>
                                    </tr>
                                </tbody>
                           </table>
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