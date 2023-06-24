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
                New Liscence
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
            Note: some of the fields are prefilled and some can be modified
        </div>
        <div class="tabbox">
            <div class="tabbox__header">
                Static Personal Information
            </div>
            <div class="tabbox__content">
                <div class="newLiscence__form cForm">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" id="Name" value="prefilled name" readonly >
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" id="Address" value="prefilled Address" readonly >
                    </div>
                    <div class="form-group">
                        <label for="FathersName">Fathers Name</label>
                        <input type="text" id="FathersName" value="prefilled fathers name" readonly >
                    </div>
                    <div class="form-group">
                        <label for="MothersName">Mothers Name</label>
                        <input type="text" id="MothersName" value="prefilled mothers name" readonly >
                    </div>
                </div>
            </div>
        </div>
       
        <div class="tabbox">
            <div class="tabbox__header">
                User Input Information
            </div>
            <div class="tabbox__content">
                <form class="userInputInfoForm cForm ">
                    <div class="form-group">
                        <label for="Phone">Phone Number</label>
                        <input type="number" id="Phone" value="984150982">
                    </div>
                    
                    <div class="form-group">
                        <label for="SpouseName">Category</label>
                        
                        <select name="" id="">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ofd">Office Visit Date</label>
                        <input type="date" id="ofd" value="2023-01-12">
                    </div>
                    <!-- <div class="form-group">
                        <label for="ofd">writtenDate</label>
                        <input type="date" id="ofd" value="2023-01-12">
                    </div> -->
                    <div class="form-group">
                        <label for="ofd">Office location</label>
                        <select name="" id="">
                            <option value="1">kathmandu</option>
                            <option value="2">chabhail</option>
                            <option value="3">thulobharyang</option>
                        </select>
                    </div>
                    <a class="cBtn cBtn--blue" type="submit" href="./confirmation.php"><span>save</span></button>
                </form>
            </div>
        </div>

        
    </section>


  <script src="./js/vendor.js"></script>
  <script src="./js/app.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>

</html>