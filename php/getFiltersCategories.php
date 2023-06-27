<?php
include 'config.php';
// Check the connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
function getFiltersCategories($conn, $name)
{

    $query = "SELECT $name FROM SocialServiceTable";
    $result = mysqli_query($conn, $query);

    $categories = array(); // Initialize an empty array to store distinct category values

    while ($row = mysqli_fetch_array($result)) {

        $categoryList = $row[$name];
        $categoryArray = explode(',', $categoryList); // Split the categories string into an array

        foreach ($categoryArray as $category) {
            $trimmedCategory = trim($category); // Remove any leading/trailing spaces from category names
            if (!in_array($trimmedCategory, $categories)) {
                $categories[] = $trimmedCategory; // Add distinct category values to the array
            }
        }
    }

    $checked = [];
    // if (isset($_GET['clearBtn'])) {
    //     unset($_SESSION['checkedFilters']);
    // header("Location: " . $_SERVER['PHP_SELF']);
    // }
    if ($_SERVER['REQUEST_METHOD'] === 'GET' || (isset($_GET['filterBen']) || isset($_GET['filterCat']) || isset($_GET['filterLoc']))) {
        if (isset($_GET['filterBen'])) {
            $checked = array_merge($checked, $_GET['filterBen']);
        }
        if (isset($_GET['filterCat'])) {
            $checked = array_merge($checked, $_GET['filterCat']);
        }
        if (isset($_GET['filterLoc'])) {
            $checked = array_merge($checked, $_GET['filterLoc']);
        }

        // Store the checked filters in session variables
        $_SESSION['checkedFilters'] = $checked;
    } else {
        // If the form is not submitted, clear the filters by unsetting the session variable
        unset($_SESSION['checkedFilters']);
        // header("Location: " . $_SERVER['PHP_SELF']);
    }
    sort($categories, SORT_LOCALE_STRING); // Sort the category values in Georgian alphabet order

    foreach ($categories as $category) {

        // $filterName = 'filter[]';
        if ($name === 'beneficiaries') {
            $filterName = 'filterBen[]';
        }
        if ($name === 'categories') {
            $filterName = 'filterCat[]';
        }
        if ($name === 'region') {
            $filterName = 'filterLoc[]';
        }
?>
        <div class="category-input">
            <input type="checkbox" value="<?= $category; ?>" name="<?= $filterName; ?>" id="<?= $category; ?>" <?php
                                                                                                                check($category, $checked)
                                                                                                                ?> />
            <label for="<?= $category; ?>"><?= $category; ?></label>

        </div>
<?php
    }
}
function check($category, $checked)
{
    if (in_array($category, $checked)) {
        echo "checked";
    }
}
/*
function getFiltersCategories($conn, $name)
{
    $query = "SELECT $name FROM SocialServiceTable";
    $result = mysqli_query($conn, $query);

    $categories = array(); // Initialize an empty array to store distinct category values

    while ($row = mysqli_fetch_array($result)) {
        $categoryList = $row[$name];
        $categoryArray = explode(',', $categoryList); // Split the categories string into an array

        foreach ($categoryArray as $category) {
            $trimmedCategory = trim($category); // Remove any leading/trailing spaces from category names
            if (!in_array($trimmedCategory, $categories)) {
                $categories[] = $trimmedCategory; // Add distinct category values to the array
                echo '<div class="category-input">
                        <input type="checkbox" value="' . $trimmedCategory . '" name="' . $trimmedCategory . '" id="' . $trimmedCategory . '" />
                        <label for="' . $trimmedCategory . '">' . $trimmedCategory . '</label>
                      </div>';
            }
        }
    }
}
*/






// echo '<div class="category-input">
// <input type="checkbox" value="' . $category . '" name="' . $filterName . '" id="' . $category . '" ' . check($category, $checked) . '

// >
// <label for="' . $category . '">' . $category . '</label>

// </div>';