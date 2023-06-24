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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,500&display=swap" rel="stylesheet">
</head>

<body>
  <!-- topbar  -->
  <section class="topbar wrapper topbar--darkbg">
    <div class="topbar__brand">
      <a href="signUp.php" class="topbar__brand__link primaryTitle">LOGO</a>
    </div>
    <a class="topbar__exit cBtn" href="signUp.php">
      <span class="cBtn__move"><iconify-icon icon="ion:enter"></iconify-icon>exit</span>
    </a>
  </section>

  <section class="candidate wrapper" id="app">
    <!-- multistep form -->
    <form id="candidate__form" class="candidate__form">
      <!-- progressbar -->
      <ul id="progressbar">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
      <!-- fieldsets -->
      <fieldset>
        <div class="candidate__form__content">
          <h3 class="candidate__form__title">
            Please enter your First, Middle, and Last Name
          </h3>
          <h4 class="candidate__form__subtitle">
            <iconify-icon icon="ri:lightbulb-fill"></iconify-icon>The Name should be the same as your state ID
          </h4>
          <div class="candidate__form__content__inputs">
            <div class="form-group">
              <label for="firstname"> First Name</label>
              <input type="text" id="firstname" name="firstname">
            </div>
            <div class="form-group">
              <label for="middleName">Middle Name</label>
              <input type="text" id="middleName" name="middleName">
            </div>
            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" id="lastName" name="lastName">
            </div>
          </div>
        </div>
        <div class="candidate__form__buttons nextBtn">
          <button disabled class="cBtn cBtn--frev previous action-button disabled" type="button">
            <span class="cBtn__notMove">Back</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-left-bold"></iconify-icon>
            </span>
          </button>
          <button class="cBtn next action-button" type="button">
            <span class="cBtn__notMove">Next</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
            </span>
          </button>
        </div>

      </fieldset>
      <fieldset>
        <div class="candidate__form__content">
          <h3 class="candidate__form__title">
            Happy to meet you Kevin
          </h3>
          <h4 class="candidate__form__subtitle">
            Can you please enter additional information.
          </h4>
          <div class="candidate__form__content__inputs ">
            <div class="form-group">
              <label for="HomeAddress">Home Address</label>
              <input type="text" id="HomeAddress" name="HomeAddress">
            </div>
            <div class="form-group">
              <label for="City">City</label>
              <input type="text" id="City" name="City">
            </div>
            <div class="form-group">
              <label for="State">State</label>
              <input type="text" id="State" name="State">
            </div>
            <div class="form-group">
              <label for="State">Zip</label>
              <input type="number" id="Zip" name="Zip">
            </div>
          </div>
        </div>
        <div class="candidate__form__buttons nextBtn">
          <button class="cBtn cBtn--frev previous action-button " type="button">
            <span class="cBtn__notMove">Back</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-left-bold"></iconify-icon>
            </span>
          </button>
          <button class="cBtn next action-button" type="button">
            <span class="cBtn__notMove">Next</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
            </span>
          </button>
        </div>
      </fieldset>
      <fieldset>
        <div class="candidate__form__content">
          <h3 class="candidate__form__title">
            Kevin
          </h3>
          <h4 class="candidate__form__subtitle">
            Please Pick the closest branch to you
          </h4>
          <div class="candidate__form__content__inputs wrapper">
            <div class="form-group ">
              <div class="form-group__selectCheck ">
                Branch
                <iconify-icon icon="ion:chevron-down"></iconify-icon>
              </div>
              <div class="form-group__options">
                <div class="form-group__options__item">
                  <input type="checkbox" id="one" value="First Option" class="styled-checkbox" />
                  <iconify-icon icon="teenyicons:tick-small-outline"></iconify-icon>
                  <label for="one">
                    branch 1
                  </label>
                </div>
                <div class="form-group__options__item">
                  <input type="checkbox" id="two" value="First Option" class="styled-checkbox" />
                  <iconify-icon icon="teenyicons:tick-small-outline"></iconify-icon>
                  <label for="two">
                    Branch 2
                  </label>
                </div>
                <div class="form-group__options__item">
                  <input type="checkbox" id="three" value="First Option" class="styled-checkbox" />
                  <iconify-icon icon="teenyicons:tick-small-outline"></iconify-icon>
                  <label for="three">
                    Branch 3
                  </label>
                </div>
                <div class="form-group__options__item">
                  <input type="checkbox" id="four" value="First Option" class="styled-checkbox" />
                  <iconify-icon icon="teenyicons:tick-small-outline"></iconify-icon>
                  <label for="four">
                    branch 4
                  </label>
                </div>
                <div class="form-group__options__item">
                  <input type="checkbox" id="five" value="First Option" class="styled-checkbox" />
                  <iconify-icon icon="teenyicons:tick-small-outline"></iconify-icon>
                  <label for="five">
                    branch 5
                  </label>
                </div>
                <div class="form-group__options__item">
                  <input type="checkbox" id="six" value="First Option" class="styled-checkbox" />
                  <iconify-icon icon="teenyicons:tick-small-outline"></iconify-icon>
                  <label for="six">
                    branch 6
                  </label>
                </div>
                <div class="form-group__options__item">
                  <input type="checkbox" id="seven" value="First Option" class="styled-checkbox" />
                  <iconify-icon icon="teenyicons:tick-small-outline"></iconify-icon>
                  <label for="seven">
                    branch 7
                  </label>
                </div>
                <div class="form-group__options__item">
                  <input type="checkbox" id="eight" value="First Option" class="styled-checkbox" />
                  <iconify-icon icon="teenyicons:tick-small-outline"></iconify-icon>
                  <label for="eight">
                    branch 8
                  </label>
                </div>
                <div class="form-group__options__item">
                  <input type="checkbox" id="eight" value="First Option" class="styled-checkbox" />
                  <iconify-icon icon="teenyicons:tick-small-outline"></iconify-icon>
                  <label for="eight">
                    branch 9
                  </label>
                </div>



              </div>
            </div>
          </div>
        </div>
        <div class="candidate__form__buttons nextBtn">
          <button class="cBtn cBtn--frev previous action-button " type="button">
            <span class="cBtn__notMove">Back</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-left-bold"></iconify-icon>
            </span>
          </button>
          <button class="cBtn next action-button" type="button">
            <span class="cBtn__notMove">Next</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
            </span>
          </button>
        </div>
      </fieldset>
      <fieldset>
        <div class="candidate__form__content">
          <h3 class="candidate__form__title">
            Kevin
          </h3>
          <h4 class="candidate__form__subtitle">
            How can we reach you?
          </h4>
          <div class="candidate__form__content__inputs">
            <div class="form-group">
              <label for="MobileNumber">Mobile Number</label>
              <input type="number" id="MobileNumber" name="MobileNumber">
            </div>
            <div class="form-group">
              <label for="Email">Email Address</label>
              <input type="email" id="Email" name="Email">
            </div>
          </div>
        </div>
        <div class="candidate__form__buttons nextBtn">
          <button class="cBtn cBtn--frev previous action-button " type="button">
            <span class="cBtn__notMove">Back</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-left-bold"></iconify-icon>
            </span>
          </button>
          <button class="cBtn next action-button" type="button">
            <span class="cBtn__notMove">Next</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
            </span>
          </button>
        </div>
      </fieldset>
      <fieldset>
        <div class="candidate__form__content">
          <h3 class="candidate__form__title">
            Kevin
          </h3>
          <h4 class="candidate__form__subtitle">
            How did you hear about us?
          </h4>
          <div class="candidate__form__content__inputs candidate__form__content__inputs--flexRow">
            <div class="form-group form-group--tab">
              <input type="checkbox" id="facebook" name="facebook" value="facebook">
              <label for="facebook">facebook</label>
            </div>
            <div class="form-group form-group--tab">
              <input type="checkbox" id="Twitter" name="Twitter" value="Twitter">
              <label for="Twitter">Twitter</label>
            </div>
            <div class="form-group form-group--tab">
              <input type="checkbox" id="Referal" name="Referal" value="Referal">
              <label for="Referal">Referal</label>
            </div>
            <div class="form-group form-group--tab">
              <input type="checkbox" id="JobFair" name="JobFair" value="JobFair">
              <label for="JobFair">Job Fair</label>
            </div>
            <div class="form-group form-group--tab">
              <input type="checkbox" id="JobBoard" name="JobBoard" value="JobBoard">
              <label for="JobBoard">JobBoard</label>
            </div>
            <div class="form-group form-group--tab">
              <input type="checkbox" id="Walkin" name="Walkin" value="Walkin">
              <label for="Walkin">Walk in</label>
            </div>
            <div class="form-group form-group--tab">
              <input type="checkbox" id="WebSite" name="WebSite" value="WebSite">
              <label for="WebSite">Web Site</label>
            </div>
            <div class="form-group form-group--tab">
              <input type="checkbox" id="CalJobs" name="CalJobs" value="CalJobs">
              <label for="CalJobs">CalJobs</label>
            </div>
            <div class="form-group form-group--tab">
              <input type="checkbox" id="Advertising" name="Advertising" value="Advertising">
              <label for="Advertising">Advertising</label>
            </div>
          </div>
        </div>
        <div class="candidate__form__buttons nextBtn">
          <button class="cBtn cBtn--frev previous action-button " type="button">
            <span class="cBtn__notMove">Back</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-left-bold"></iconify-icon>
            </span>
          </button>
          <button class="cBtn next action-button" type="button">
            <span class="cBtn__notMove">Next</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
            </span>
          </button>
        </div>
      </fieldset>
      <fieldset>
        <div class="candidate__form__content">
          <h3 class="candidate__form__title">
            Kevin
          </h3>
          <h4 class="candidate__form__subtitle">
            What type of work are you looking for?
          </h4>
          <div class="candidate__form__content__inputs candidate__form__content__inputs--radio">
            <div class="form-group form-group--tab">
              <input type="radio" id="fullTime" name="workType" value="fullTime">
              <label for="fullTime">Full Time</label>
            </div>
            <div class="form-group form-group--tab">
              <input type="radio" id="Part-Time" name="workType" value="Part-Time">
              <label for="Part-Time">Part-Time</label>
            </div>
          </div>
        </div>
        <div class="candidate__form__buttons nextBtn">
          <button class="cBtn cBtn--frev previous action-button " type="button">
            <span class="cBtn__notMove">Back</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-left-bold"></iconify-icon>
            </span>
          </button>
          <button class="cBtn next action-button" type="button">
            <span class="cBtn__notMove">Next</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
            </span>
          </button>
        </div>
      </fieldset>
      <fieldset>
        <div class="candidate__form__content">
          <h3 class="candidate__form__title">
            Kevin
          </h3>
          <h4 class="candidate__form__subtitle">
            Which desired position are you applying for?
          </h4>
          <div class="candidate__form__content__inputs candidate__form__content__inputs--flexRow">
            <div class="form-group form-group--tab  form-group--green   ">
              <input type="checkbox" id="Manufacturing" name="Manufacturing" value="Manufacturing">
              <label for="facebook">Manufacturing</label>
            </div>
            <div class="form-group form-group--tab  form-group--green ">
              <input type="checkbox" id="Professional" name="Professional" value="Professional">
              <label for="Professional">Professional</label>
            </div>
            <div class="form-group form-group--tab  form-group--green ">
              <input type="checkbox" id="Referal" name="Retail" value="Retail">
              <label for="Retail">Retail</label>
            </div>
            <div class="form-group form-group--tab  form-group--green ">
              <input type="checkbox" id="ShippingRec" name="ShippingRec" value="ShippingRec">
              <label for="ShippingRec">Shipping & Rec</label>
            </div>
            <div class="form-group form-group--tab  form-group--green ">
              <input type="checkbox" id="Warehouse" name="Warehouse" value="Warehouse">
              <label for="Warehouse">Warehouse</label>
            </div>
            <div class="form-group form-group--tab  form-group--green ">
              <input type="checkbox" id="Construction" name="Construction" value="Construction">
              <label for="Construction">Construction</label>
            </div>
          </div>
        </div>
        <div class="candidate__form__buttons nextBtn">
          <button class="cBtn cBtn--frev previous action-button " type="button">
            <span class="cBtn__notMove">Back</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-left-bold"></iconify-icon>
            </span>
          </button>
          <button class="cBtn next action-button" type="button">
            <span class="cBtn__notMove">Next</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
            </span>
          </button>
        </div>
      </fieldset>
      <fieldset>
        <div class="candidate__form__content">
          <h3 class="candidate__form__title">
            Custom Question Part 1
          </h3>
          <div class="candidate__form__content__customQuestions">
            <div class="candidate__form__content__question">
              <div class="candidate__form__content__question__header">
                <h5 class="candidate__form__content__question__listType"><iconify-icon
                    icon="material-symbols:arrow-right-alt-rounded"></iconify-icon>1</h5>
                What makes you passionate about this job?
              </div>
              <div class="candidate__form__content__inputs candidate__form__content__inputs--flexRow">
                <div class="form-group form-group--tab">
                  <input type="radio" id="Choice1" name="customQuestion1" value="Choice1">
                  <label for="Choice1">Choice 1</label>
                </div>
                <div class="form-group form-group--tab">
                  <input type="radio" id="Choice2" name="customQuestion1" value="Choice2">
                  <label for="Choice2">Choice 2</label>
                </div>
                <div class="form-group form-group--tab">
                  <input type="radio" id="Choice3" name="customQuestion1" value="Choice3">
                  <label for="Choice3">Choice 3</label>
                </div>
              </div>
            </div>
            <div class="candidate__form__content__question">
              <div class="candidate__form__content__question__header">
                <h5 class="candidate__form__content__question__listType"><iconify-icon
                    icon="material-symbols:arrow-right-alt-rounded"></iconify-icon>2</h5>
                How do you handle working in a fast-paced environment?
              </div>
              <div class="candidate__form__content__inputs candidate__form__content__inputs--flexRow">
                <div class="form-group form-group--tab     ">
                  <input type="checkbox" id="q3choice1" name="q3choice1" value="q3choice1">
                  <label for="facebook">choice 1 </label>
                </div>
                <div class="form-group form-group--tab   ">
                  <input type="checkbox" id="q3choice2" name="q3choice2" value="q3choice2">
                  <label for="q3choice2">choice 2</label>
                </div>
                <div class="form-group form-group--tab   ">
                  <input type="checkbox" id="q3choice3" name="q3choice3" value="q3choice3">
                  <label for="q3choice3">choice 3</label>
                </div>
              </div>
            </div>
            <div class="candidate__form__content__question">
              <div class="candidate__form__content__question__header">
                <h5 class="candidate__form__content__question__listType"><iconify-icon
                    icon="material-symbols:arrow-right-alt-rounded"></iconify-icon>3</h5>
                What challenges have you faced in your previous roles?
              </div>
              <div class="candidate__form__content__inputs ">
                <div class="form-group ">
                  <input type="text" placeholder="Type your answer here">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="candidate__form__buttons nextBtn">
          <button class="cBtn cBtn--frev previous action-button " type="button">
            <span class="cBtn__notMove">Back</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-left-bold"></iconify-icon>
            </span>
          </button>
          <button class="cBtn next action-button" type="button">
            <span class="cBtn__notMove">Next</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
            </span>
          </button>
        </div>
      </fieldset>
      <fieldset>
        <div class="candidate__form__content">
          <h3 class="candidate__form__title">
            Custom Question Part 2
          </h3>
          <div class="candidate__form__content__customQuestions">
            <div class="candidate__form__content__question">
              <div class="candidate__form__content__question__header">
                <h5 class="candidate__form__content__question__listType"><iconify-icon
                    icon="material-symbols:arrow-right-alt-rounded"></iconify-icon>4</h5>
                What makes you passionate about this job?
              </div>
              <div class="candidate__form__content__inputs candidate__form__content__inputs--flexRow">
                <div class="form-group form-group--tab">
                  <input type="radio" id="q2Choice1" name="customQuestion2" value="Choice1">
                  <label for="q2Choice1">Choice 1</label>
                </div>
                <div class="form-group form-group--tab">
                  <input type="radio" id="q2Choice2" name="customQuestion2" value="Choice2">
                  <label for="q2Choice2">Choice 2</label>
                </div>
                <div class="form-group form-group--tab">
                  <input type="radio" id="q2Choice3" name="customQuestion2" value="Choice3">
                  <label for="q2Choice3">Choice 3</label>
                </div>
              </div>
            </div>
            <div class="candidate__form__content__question">
              <div class="candidate__form__content__question__header">
                <h5 class="candidate__form__content__question__listType"><iconify-icon
                    icon="material-symbols:arrow-right-alt-rounded"></iconify-icon>5</h5>
                How do you handle working in a fast-paced environment?
              </div>
              <div class="candidate__form__content__inputs candidate__form__content__inputs--flexRow">
                <div class="form-group form-group--tab     ">
                  <input type="checkbox" id="q3choice1" name="q3choice1" value="q3choice1">
                  <label for="facebook">choice 1 </label>
                </div>
                <div class="form-group form-group--tab   ">
                  <input type="checkbox" id="q3choice2" name="q3choice2" value="q3choice2">
                  <label for="q3choice2">choice 2</label>
                </div>
                <div class="form-group form-group--tab   ">
                  <input type="checkbox" id="q3choice3" name="q3choice3" value="q3choice3">
                  <label for="q3choice3">choice 3</label>
                </div>
              </div>
            </div>
            <div class="candidate__form__content__question">
              <div class="candidate__form__content__question__header">
                <h5 class="candidate__form__content__question__listType"><iconify-icon
                    icon="material-symbols:arrow-right-alt-rounded"></iconify-icon>6</h5>
                What challenges have you faced in your previous roles?
              </div>
              <div class="candidate__form__content__inputs ">
                <div class="form-group ">
                  <input type="text" placeholder="Type your answer here">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="candidate__form__buttons nextBtn">
          <button class="cBtn cBtn--frev previous action-button " type="button">
            <span class="cBtn__notMove">Back</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-left-bold"></iconify-icon>
            </span>
          </button>
          <button class="cBtn next action-button" type="button">
            <span class="cBtn__notMove">Next</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
            </span>
          </button>
        </div>
      </fieldset>

      <fieldset>
        <div class="candidate__form__content">
          <h3 class="candidate__form__title">
            Kevin
          </h3>
          <h4 class="candidate__form__subtitle">
            Which desired position are you applying for?
          </h4>
          <div class="candidate__form__content__candidateHistory">
            <div class="candidate__form__content__candidateHistory__item ">
              <div class="candidate__form__content__candidateHistory__item__desc">
                <img src="./iconImages/document-download.png" alt=""
                  class="candidate__form__content__candidateHistory__item__icon">
                <div class="candidate__form__content__candidateHistory__item__title">
                  <div id="file-name">Attach Resume </div>
                </div>
              </div>

              <label for="file-upload" class="cBtn custom-file-upload cBtn--black added">
                <span class="cBtn__move">
                  Upload File
                </span>
              </label>
              <input id="file-upload" type="file" />

            </div>
            <div class="candidate__form__content__candidateHistory__item">
              <div class="candidate__form__content__candidateHistory__item__desc">
                <img src="./iconImages/clipboard-text.png" alt=""
                  class="candidate__form__content__candidateHistory__item__icon">
                <div class="candidate__form__content__candidateHistory__item__title">
                  Add References
                </div>
              </div>
              <button type="button" class="cBtn cBtn--black" data-bs-toggle="modal" data-bs-target="#addReferenceModal">
                <span class="cBtn__move"> Add</span>
              </button>
              <div class="modal fade " id="addReferenceModal" tabindex="-1" aria-labelledby="addReferenceModal"
                aria-hidden="true">
                <div class="modal-dialog w-696 modal-dialog-centered">
                  <div class="modal-content modal-content--roundedBorder">
                    <div class="modal-header modal-header--variant1">
                      <h1 class="modal-title" id="exampleModalLabel">Add Reference</h1>
                      <button type="button" class=" btn-close--variant1" data-bs-dismiss="modal" aria-label="Close">
                        <iconify-icon icon="mingcute:close-circle-line"></iconify-icon>
                      </button>
                    </div>
                    <div class="modal-body grid-2 candidate__form__content__inputs modalInputsVarriant1">
                      <div class="form-group">
                        <label for="ReferenceName">Reference Name</label>
                        <input type="text" id="ReferenceName">
                      </div>
                      <div class="form-group">
                        <label for="ReferenceType">Reference Type</label>
                        <input type="text" id="ReferenceType">
                      </div>
                      <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="number" id="Phone">
                      </div>
                      <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" id="Email">
                      </div>
                      <div class="form-group">
                        <label for="Comments">Comments</label>
                        <input type="text" id="Comments">
                      </div>
                    </div>
                    <div class="modal-footer modal-footer--variant1">
                      <button type="button" class="cBtn"><span class="cBtn__move">submit</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="candidate__form__content__candidateHistory__item added">
              <div class="candidate__form__content__candidateHistory__item__desc">
                <img src="./iconImages/uploadedIcon.png" alt=""
                  class="candidate__form__content__candidateHistory__item__icon">
                <div class="candidate__form__content__candidateHistory__item__title">
                  Add Employment History
                </div>
              </div>
              <button type="button" class="cBtn cBtn--black" data-bs-toggle="modal"
                data-bs-target="#addEmploymentHistory">
                <span class="cBtn__move"> Edit</span>
              </button>
              <div class="modal fade " id="addEmploymentHistory" tabindex="-1" aria-labelledby="addEmploymentHistory"
                aria-hidden="true" id="employeeHistoryForm">
                <div class="modal-dialog w-696 modal-dialog-centered">
                  <div class="modal-content modal-content--roundedBorder">
                    <div class="modal-header modal-header--variant1">
                      <h1 class="modal-title" id="exampleModalLabel">Add Employment History</h1>
                      <button type="button" class=" btn-close--variant1" data-bs-dismiss="modal" aria-label="Close">
                        <iconify-icon icon="mingcute:close-circle-line"></iconify-icon>
                      </button>
                    </div>
                    <div class="modal-body   grid-6 candidate__form__content__inputs modalInputsVarriant1">
                      <div class="form-group grid-col--6">
                        <label for="CompanyName">Company Name</label>
                        <input type="text" id="CompanyName">
                      </div>
                      <div class="form-group grid-col--6">
                        <label for="SupervisorName">Supervisor Name</label>
                        <input type="text" id="SupervisorName">
                      </div>
                      <div class="form-group grid-col--6">
                        <label for="Address">Address</label>
                        <input type="text" id="Address">
                      </div>
                      <div class="form-group grid-col--6">
                        <label for="Phone">Phone</label>
                        <input type="number" id="Phone">
                      </div>
                      <div class="form-group grid-col--4">
                        <label for="City">City</label>
                        <input type="text" id="City">
                      </div>
                      <div class="form-group grid-col--4">
                        <label for="State">State</label>
                        <input type="text" id="State">
                      </div>
                      <div class="form-group grid-col--4">
                        <label for="Zip">Zip</label>
                        <input type="number" id="Zip">
                      </div>
                      <div class="form-group grid-col--6">
                        <label for="JobTitle">Job Title</label>
                        <input type="text" id="JobTitle">
                      </div>
                      <div class="form-group grid-col--6">
                        <label for="JobDuties">Job Duties</label>
                        <input type="text" id="JobDuties">
                      </div>
                      <div class="form-group grid-col--4">
                        <label for="StartDate">Start Date</label>
                        <input type="date" id="StartDate">
                      </div>
                      <div class="form-group grid-col--4">
                        <label for="EndDate">End Date</label>
                        <input type="date" id="EndDate">
                      </div>
                      <div class="form-group grid-col--4">
                        <label for="ReasonForLeaving">Reason For Leaving</label>
                        <input type="text" id="ReasonForLeaving">
                      </div>
                    </div>
                    <div class="modal-footer modal-footer--variant1">
                      <button type="button" class="cBtn" onsubmit=" formSubmitHandler()"><span
                          class="cBtn__move">submit</span></button>
                    </div>
                  </div>
                </div>
              </div>
              <button class="addMoreBtn" data-bs-toggle="modal" data-bs-target="#addEmploymentHistory" type="button">

              </button>
            </div>
          </div>
        </div>
        <div class="candidate__form__buttons nextBtn">
          <button class="cBtn cBtn--frev previous action-button " type="button">
            <span class="cBtn__notMove">Back</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-left-bold"></iconify-icon>
            </span>
          </button>
          <a class="cBtn next action-button" type="button" href="congratulation.php">
            <span class="cBtn__notMove">Next</span>
            <span class=" cBtn cBtn__icon">
              <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
            </span>
          </a>
        </div>
      </fieldset>
    </form>
  </section>


  <!-- vendors thirdparty---------------------------------------------------- -->
  <script src="./js/vendor.js"></script>
  <script src="./js/app.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>

</html>