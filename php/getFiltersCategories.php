<?php
include 'config.php';
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

function getFiltersCategories($conn, $name)
{
    $query = "SELECT $name FROM SocialServiceTable";
    $result = sqlsrv_query($conn, $query);

    $categories = array(); // Initialize an empty array to store distinct category values

    while ($row = sqlsrv_fetch_array($result)) {

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
    if (isset($_GET['filterBen'])) {
        $checked = $_GET['filterBen'];
    }
    if (isset($_GET['filterCat'])) {
        $checked = $_GET['filterCat'];
    }
    if (isset($_GET['filterLoc'])) {
        $checked = $_GET['filterLoc'];
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
                                                                                                                if (in_array($category, $checked)) {
                                                                                                                    echo "checked";
                                                                                                                }
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
    $result = sqlsrv_query($conn, $query);

    $categories = array(); // Initialize an empty array to store distinct category values

    while ($row = sqlsrv_fetch_array($result)) {
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