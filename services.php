<?php
include './php/config.php';
require_once("./php/getFiltersCategories.php");
require_once("./php/getPosts.php");
include './php/filter.php';
header('Content-Type: text/html; charset=utf-8');
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
          <!-- <li>
            <div class="navbar_search_box">
              <input class="navbarsearch_input" type="text" placeholder="ძებნა..." />
              <i class="fa fa-search"></i>
            </div>
          </li> -->
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
      <form action="" method="GET" id="searchForm">
        <div class="navbar_search_box">
          <input id="searchBar" class="navbarsearch_input" type="text" name="searchBar" placeholder="ძებნა..." />
          <button type="submit" id="searchIcon">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </form>
      <form action="" method="GET" id="filterForm">
        <!-- <div class="buttons-container"> 
           <button type="button" id="submitBtn">Submit</button> -->
        <!-- <button type="button" class="clearBtn" id="clearBtn" name="clearBtn"> -->
        <!-- <span> გასუფთავება </span> -->
        <!-- ===== icon here ===== -->
        <!-- </button> -->
        <!-- </div> -->
        <!-- <div class="search-bar"></div> -->
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
      <button class="clearbtn" onclick="location.href='<?php echo $_SERVER['PHP_SELF']; ?>'"><a href="<?php echo $_SERVER['PHP_SELF']; ?>">ფილტრის გასუფთავება</a><img src="./img/data-cleaning.svg" class="cleaning-icon" /></button>
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
      var allCheckboxes = document.querySelectorAll('input[type="checkbox"]')
      // Submit button click event
      $('#submitBtn').click(function() {
        submitForm();
      });

      // Checkbox change event
      $('#filterForm input[type="checkbox"]').change(function() {
        submitForm();
      });


      $('#searchBar').keyup((e) => {
        if (e.keyCode === 13) {
          searchForm();
        }
      });

      $('#searchIcon').click(function(e) {
        searchForm();
      });

      // Function to submit the form via AJAX
      function submitForm() {
        var formData = $('#filterForm').serialize(); // Serialize form data
        // Show loading animation
        $('.render-here').html('<div class="loading"></div>');

        // Send AJAX request after a small delay
        setTimeout(function() {
          $.ajax({
            url: 'services.php',
            type: 'GET',
            data: formData, // Pass form data as AJAX parameters
            success: function(response) {
              var updatedContent = $(response).find('.render-here').html();
              $('.render-here').html(updatedContent); // Update the specific content
            },
            error: function(xhr, status, error) {
              console.error(xhr.responseText); // Log any error messages
            }
          });
        }, 300);

      }

      function searchForm(event) {

        var searchForm = $('#searchForm').serialize();
        $('.render-here').html('<div class="loading"></div>');

        // Send AJAX request
        setTimeout(function(e) {
          event.preventDefault();
          $.ajax({
            url: 'services.php',
            type: 'GET',
            data: searchForm, // Pass form data as AJAX parameters
            success: function(response) {
              var updatedContent = $(response).find('.render-here').html();
              $('.render-here').html(updatedContent); // Update the specific content
            },
            error: function(xhr, status, error) {
              console.error(xhr.responseText); // Log any error messages
            }
          });
        }, 300);



      }



      // Function to clear the form
      function clearForm() {
        $('#filterForm input[type="checkbox"]').prop('checked', false);
        submitForm(); // Submit the form to update the content
      }




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


    // beneficiariesCheckboxes.forEach((checkbox) => {
    //   if (document.getElementById('locations').classList != 'display' && checkbox.checked) {
    //     document.getElementById('beneficiaries').classList.add('display')
    //     document.querySelector(".benef").classList.toggle("rotate");

    //   }
    // });
    // categoriesCheckboxes.forEach((checkbox) => {
    //   if (document.getElementById('locations').classList != 'display' && checkbox.checked) {
    //     document.getElementById('categories').classList.add('display')
    //     document.querySelector(".category").classList.toggle("rotate");

    //   }
    // });
    // locationCheckboxes.forEach((checkbox) => {
    //   if (document.getElementById('locations').classList != 'display' && checkbox.checked) {
    //     document.getElementById('locations').classList.add('display')
    //     document.querySelector(".locations").classList.toggle("rotate");

    //   }
    // });

    // allCheckboxes.forEach((checkbox) => {
    //   if (!checkbox.checked) {
    //     console.log("checked!!!!!")
    //   }
    // })

    // Find all Facebook share buttons
    var facebookShareButtons = document.querySelectorAll('.facebook-share-button');

    // Attach click event listener to each button
    facebookShareButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        var postId = this.getAttribute('data-postid');
        var postUrl = window.location.href + '?post=' + postId;

        // Encode the post URL
        var encodedUrl = encodeURIComponent(postUrl);

        // Open Facebook share dialog with the encoded post URL
        var shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodedUrl;
        window.open(shareUrl, '_blank');
      });
    });
  </script>



  <script src="app.js" type="module" defer></script>

</body>

</html>