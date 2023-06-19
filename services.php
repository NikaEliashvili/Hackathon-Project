<?php
include './php/config.php';
require_once("./php/getFiltersCategories.php");
require_once("./php/getPosts.php");
include './php/filter.php';
session_start();
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}
?>

<!DOCTYPE html svg PUBLIC "-//W3C//DTD SVG 20010904//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
<html lang="ka">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>სოციალური სერვისები</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/regular.min.css" />
  <script src="https://kit.fontawesome.com/c5b90c4725.js" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="swiper-bundle.min.css" />
  <link rel="stylesheet" href="swiper-bundle.min.css" />
  <link rel="icon" href="img/Social Services Logo (middle).png" />
  <link rel="stylesheet" href="bpg-nateli-master/css/bpg-nateli.min.css" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body id="servicesBD">
  <!--===========================online-contact=============================-->
  <!-- 
        <div class="contact_corner_box">
            <div class="contact_corner_content active">
                <div class="contact_header">
                    <div class="contact_header_title_box">
                        <h3>contact us</h3>
                        <div>
                            <i class="fa fa-circle"></i>
                            <p>online</p>
                        </div>
                    </div>
                    <i class="fa-solid fa-minus message_box_remove_btn"></i>
                </div>
                <div class="contact_chat_box">
                    <div class="message_box">
                
      <h3>22:13</h3>
      <div>
        <p>hello my name is zzz</p>
      </div>
       
                    </div>
                </div>
                <div class="contact_input_box">
                    <input type="text" placeholder="type something" />
                    <i class="fa fa-paper-plane send_msg_btn"></i>
                </div>
            </div>
            <i class="fa fa-message chat_open_btn"></i>
        </div>
         -->
  <!--===========================nav=============================-->
  <section class="navbar_container">
    <nav>
      <div class="navbar_box1" onclick="location.href='index.php'">
        <img src="img/Social Services Logo (middle).png" alt="" />
        <h1>სოციალური სერვისები</h1>
      </div>
      <div class="navbar_box2">
        <ul>
          <li>
            <a href="index.php">მთავარი</a>
          </li>
          <li>
            <a href="services.php">სერვისები</a>
          </li>
          <li>
            <a href="#">ჩვენ შესახებ</a>
          </li>
          <li>
            <a href="contact.php">კონტაქტები</a>
          </li>
          <li>
            <div class="navbar_search_box">
              <input class="navbarsearch_input" type="text" placeholder="ძებნა..." />
              <i class="fa fa-search"></i>
            </div>
          </li>
          <div class="navbar_menu">
            <span class="line1"></span>
            <span class="line2"></span>
            <span class="line3"></span>
          </div>
        </ul>
      </div>
    </nav>
    <div class="responsive_navbar_box">
      <ul>
        <li onclick="location.href='index.php'">
          <a href="index.php">მთავარი</a>
        </li>
        <li onclick="location.href='services.php'">
          <a href="services.php">სერვისები</a>
        </li>
        <li>
          <a href="#">ჩვენ შესახებ</a>
        </li>
        <li onclick="location.href='contact.php'">
          <a href="contact.php">კონტაქტები</a>
        </li>
      </ul>
    </div>
  </section>
  <br />
  <!--===========================filter=============================-->
  <section class="main-container">
    <div class="left-section">
      <form action="" method="GET" id="filterForm">
        <div class="buttons-container">
          <!-- <button type="button" id="submitBtn">Submit</button> -->
          <button type="button" class="clearBtn" id="clearBtn" name="clearBtn">
            <!-- <span> გასუფთავება </span> -->

            <svg class="cleaning-icon" version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

              <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none">
                <path d="M4382 5100 c-88 -23 -177 -69 -239 -124 -26 -23 -272 -311 -546 -641
-275 -330 -509 -610 -520 -622 l-19 -22 68 -34 c208 -106 400 -294 531 -519
41 -70 48 -77 62 -65 9 8 286 239 616 514 330 274 621 523 647 553 91 104 138
235 138 383 0 165 -56 303 -170 418 -150 152 -365 212 -568 159z" />
                <path d="M2330 3499 c-155 -18 -336 -85 -468 -173 -37 -24 -134 -104 -217
-176 -619 -545 -1121 -839 -1589 -930 l-59 -12 6 -107 c11 -174 50 -359 101
-475 14 -31 32 -59 40 -62 40 -15 355 52 455 97 35 16 66 29 68 29 6 0 -70
-89 -224 -262 -68 -76 -123 -144 -123 -151 0 -18 164 -201 229 -256 l52 -43
104 50 c206 100 447 260 645 427 88 74 93 77 71 40 -70 -115 -362 -581 -411
-655 -80 -120 -78 -117 -39 -93 284 173 502 313 627 405 28 21 52 36 52 34 0
-3 -12 -22 -26 -43 -42 -61 -93 -168 -149 -313 -46 -118 -115 -322 -115 -341
0 -7 95 -48 283 -119 136 -51 138 -52 190 -40 281 67 719 477 1216 1140 381
508 457 662 468 948 6 148 -5 244 -43 361 -130 395 -476 673 -897 720 -107 12
-139 12 -247 0z" />
                <path d="M3293 939 c-57 -28 -83 -72 -83 -139 0 -67 27 -112 84 -139 54 -26
88 -26 142 0 57 27 84 72 84 139 0 67 -27 112 -84 139 -54 26 -90 26 -143 0z" />
                <path d="M3755 627 c-56 -19 -81 -33 -127 -75 -98 -88 -127 -245 -70 -367 33
-68 92 -127 161 -158 65 -30 187 -30 252 0 164 75 236 268 161 428 -33 69 -93
128 -161 158 -56 25 -162 32 -216 14z" />
                <path d="M2653 299 c-57 -28 -83 -72 -83 -139 0 -67 27 -112 84 -139 54 -26
88 -26 142 0 57 27 84 72 84 139 0 67 -27 112 -84 139 -54 26 -90 26 -143 0z" />
              </g>
            </svg>

          </button>
        </div>
        <div class="category-form">
          <div class="category-box">
            ბენეფიციარები <span class="benef arrow"></span>
          </div>
          <div class="categories-all overflowScrollBar" id="beneficiaries">
            <!-- render beneficiaries All - Checkboxes -->
            <?php
            getFiltersCategories($conn, 'beneficiaries');
            ?>

          </div>
        </div>
        <div class="category-form">
          <div class="category-box">
            კატეგორია<span class="category arrow"></span>
          </div>
          <div class="categories-all overflowScrollBar" id="categories">
            <!-- render categories All - Checkboxes -->
            <?php
            getFiltersCategories($conn, 'categories');
            ?>


          </div>
        </div>
        <div class="category-form">
          <div class="category-box">
            ლოკაცია<span class="locations arrow"></span>
          </div>
          <div class="categories-all overflowScrollBar" id="locations">
            <!-- render regions All - Checkboxes -->
            <?php
            getFiltersCategories($conn, 'region');
            ?>
          </div>
        </div>

      </form>
    </div>
    <div class="right-section">
      <div class="render-here">
        <?php
        getMainPosts($conn);
        ?>

      </div>
    </div>
  </section>
  <br />
  <!--===========================footer=============================-->
  <section class="footer_container">
    <div class="footer_content">
      <div class="footer_top_row">
        <ul>
          <li>
            <img src="img/Social Services Logo (middle).png" alt="#" />
            <h3>სოციალური სერვისები</h3>
          </li>
          <li>
            <a href="#">WEEBLY THEMES</a>
            <a href="#">PRE-SALE FAQS</a>
            <a href="#">SUBMIT A TICKET</a>
          </li>
          <li>
            <a href="#">SERVICES</a>
            <a href="#">THEME TWEAK</a>
          </li>
          <li>
            <a href="#">SHOWCASE</a>
            <a href="#">WIDGETKIT</a>
            <a href="#">SUPPORT</a>
          </li>
          <li>
            <a href="#">ABOUT US</a>
            <a href="#">CONTACT US</a>
            <a href="#">AFFILIATES</a>
            <a href="#">RESOURCES</a>
          </li>
        </ul>
      </div>
      <div class="footer_bottom_row">
        <i class="fa-brands fa-facebook fa-2xl"></i>
        <i class="fa-brands fa-twitter fa-2xl"></i>
        <i class="fa-brands fa-instagram fa-2xl"></i>
        <i class="fa-brands fa-linkedin fa-2xl"></i>
      </div>
    </div>
  </section>


  <!-- <script type="text/javascript">
    const locationCheckboxes = document.querySelectorAll('input[name="filterLoc[]"]');
    const categoriesCheckboxes = document.querySelectorAll('input[name="filterCat[]"]');
    const beneficiariesCheckboxes = document.querySelectorAll('input[name="filterBen[]"]');

    // Add event listeners to checkboxes
    locationCheckboxes.forEach((checkbox) =>
      checkbox.addEventListener('change', handleCheckboxChange)
    );
    categoriesCheckboxes.forEach((checkbox) =>
      checkbox.addEventListener('change', handleCheckboxChange)
    );
    beneficiariesCheckboxes.forEach((checkbox) =>
      checkbox.addEventListener('change', handleCheckboxChange)
    );

    // Restore checkbox states on page load
    document.addEventListener('DOMContentLoaded', restoreCheckboxStates);

    function handleCheckboxChange() {
      let thisValue = this.value;
      let isCheck = this.checked;
      if (isCheck) {
        console.log("checked", thisValue);
        saveCheckboxState(thisValue, true);
      } else {
        console.log("is not checked", thisValue);
        saveCheckboxState(thisValue, false);
      }
    }

    function saveCheckboxState(checkboxValue, isChecked) {
      // Save checkbox state to local storage
      let checkboxStates = JSON.parse(localStorage.getItem('checkboxStates')) || {};
      checkboxStates[checkboxValue] = isChecked;
      localStorage.setItem('checkboxStates', JSON.stringify(checkboxStates));
    }

    function restoreCheckboxStates() {
      // Restore checkbox states from local storage
      let checkboxStates = JSON.parse(localStorage.getItem('checkboxStates')) || {};
      for (let checkbox of locationCheckboxes) {
        let checkboxValue = checkbox.value;
        if (checkboxStates[checkboxValue]) {
          checkbox.checked = true;
        }
      }
      for (let checkbox of categoriesCheckboxes) {
        let checkboxValue = checkbox.value;
        if (checkboxStates[checkboxValue]) {
          checkbox.checked = true;
        }
      }
      for (let checkbox of beneficiariesCheckboxes) {
        let checkboxValue = checkbox.value;
        if (checkboxStates[checkboxValue]) {
          checkbox.checked = true;
        }
      }
    }
  </script> -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {

      // Submit button click event
      $('#submitBtn').click(function() {
        submitForm();
      });

      // Clear button click event
      $('#clearBtn').click(function() {
        clearForm();
      });

      // Checkbox change event
      $('#filterForm input[type="checkbox"]').change(function() {
        submitForm();
      });

      // Function to submit the form via AJAX
      function submitForm() {
        var formData = $('#filterForm').serialize(); // Serialize form data
        // Show loading animation
        $('.render-here').html('<div class="loading"></div>');

        // Delay for minimum duration
        var delayTimer = setTimeout(function() {
          $.ajax({
            url: 'services.php?' + formData, // Append form data to the URL
            type: 'GET',
            success: function(response) {
              var updatedContent = $(response).find('.render-here').html();
              $('.render-here').html(updatedContent); // Update the specific content
            },
            error: function(xhr, status, error) {
              console.error(xhr.responseText); // Log any error messages
            }
          });
        }, 300);

        // Clear the timeout if the form is submitted again
        // clearTimeout(delayTimer);
      }

      // Function to clear the form
      function clearForm() {
        $('#filterForm input[type="checkbox"]').prop('checked', false);
        submitForm(); // Submit the form to update the content
      }





      // Clear button click event
      // $('#clearBtn').click(function() {
      //   $('#filterForm input[type="checkbox"]').prop('checked', false);
      //   $('#filterForm').submit();
      // });
      // // Checkbox change event
      // $('#filterForm input[type="checkbox"]').change(function() {
      //   $('#filterForm').submit();
      // });
    });
    var locationCheckboxes = document.querySelectorAll('input[name="filterLoc[]"]');
    var categoriesCheckboxes = document.querySelectorAll('input[name="filterCat[]"]');
    var beneficiariesCheckboxes = document.querySelectorAll('input[name="filterBen[]"]');


    beneficiariesCheckboxes.forEach((checkbox) => {
      if (document.getElementById('locations').classList != 'display' && checkbox.checked) {
        document.getElementById('beneficiaries').classList.add('display')
        document.querySelector(".benef").classList.toggle("rotate");

      }
    })
    categoriesCheckboxes.forEach((checkbox) => {
      if (document.getElementById('locations').classList != 'display' && checkbox.checked) {
        document.getElementById('categories').classList.add('display')
        document.querySelector(".category").classList.toggle("rotate");

      }
    })
    locationCheckboxes.forEach((checkbox) => {
      if (document.getElementById('locations').classList != 'display' && checkbox.checked) {
        document.getElementById('locations').classList.add('display')
        document.querySelector(".locations").classList.toggle("rotate");

      }
    })
  </script>



  <script src="app.js" type="module" defer></script>

</body>

</html>