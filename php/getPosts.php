<?php

include 'config.php';
// Check the connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

function getMainPosts($conn)
{
    if (isset($_GET['region'])) {
        $searchValue = filter_input(INPUT_GET, 'region', FILTER_SANITIZE_SPECIAL_CHARS);
        $searchQuery = "SELECT * FROM SocialServiceTable WHERE region LIKE '%$searchValue%'  OR locations LIKE '%$searchValue%'";
        // echo $searchValue;
        $queryRun = mysqli_query($conn, $searchQuery);
        if (mysqli_num_rows($queryRun) > 0) {
            while ($row = mysqli_fetch_assoc($queryRun)) {

                $title = $row['title'];
                $description = $row['service_description'];
                $categories = $row['categories'];
                $locations = $row['locations'];
                $locations = $row['region'];
                $beneficiaries = $row['beneficiaries'];

                // Highlight the searched words in the title
                $locations = highlightSearchedWords($locations, $searchValue);
                // Render the posts as before
                echo ' <div class="container-info" data-titlecontainer="' . $row['id'] . '">
                <div class="title" data-titlecontainer="' . $row['id'] . '">
                    <div class="main-info" data-titlecontainer="' . $row['id'] . '">
                    <p class="title-text" data-titlecontainer="' . $row['id'] . '"> ' . $title . ' </p>
                    <span class="more-info" data-titlecontainer="' . $row['id'] . '"><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">ბენეფიციარები:</p><p> ' . $beneficiaries . ' </p> </div><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">კატეგორია:</p> <p> ' . $categories . ' </p></div><div data-titlecontainer="' . $row['id'] . '" class="small-section"> <span class="span" data-titlecontainer="' . $row['id'] . '">ლოკაცია:</span><p> ' . $locations . ' </p> </span></div>
                    </div>
                    <i class="fa-solid fa-caret-down plus-icon " id="icon-' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '"></i>
                </div>
                <div class="description" id="' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '">
                    <p>
                    ' . $description . '
                    </p>
                    <br />
                    <a
                    class="seeMorelink"
                    target="_blank"
                    href="' . $row['link'] . '"
                    alt="დეტალურად ნახვა"
                    >დეტალურად</a>
                </div>
        </div> ';
            }
        } else {
            echo '<h3>ინფორმაცია ვერ მოიძებნა...</h3>';
        }
    } else if (isset($_GET['categories'])) {
        $searchValue = filter_input(INPUT_GET, 'categories', FILTER_SANITIZE_SPECIAL_CHARS);
        $searchQuery = "SELECT * FROM SocialServiceTable WHERE categories LIKE '%$searchValue%'  OR locations LIKE '%$searchValue%'";
        // echo $searchValue;
        $queryRun = mysqli_query($conn, $searchQuery);
        if (mysqli_num_rows($queryRun) > 0) {
            while ($row = mysqli_fetch_assoc($queryRun)) {

                $title = $row['title'];
                $description = $row['service_description'];
                $categories = $row['categories'];
                $locations = $row['locations'];
                $locations = $row['region'];
                $beneficiaries = $row['beneficiaries'];

                // Highlight the searched words in the title
                $locations = highlightSearchedWords($locations, $searchValue);
                // Render the posts as before
                echo ' <div class="container-info" data-titlecontainer="' . $row['id'] . '">
                <div class="title" data-titlecontainer="' . $row['id'] . '">
                    <div class="main-info" data-titlecontainer="' . $row['id'] . '">
                    <p class="title-text" data-titlecontainer="' . $row['id'] . '"> ' . $title . ' </p>
                    <span class="more-info" data-titlecontainer="' . $row['id'] . '"><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">ბენეფიციარები:</p><p> ' . $beneficiaries . ' </p> </div><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">კატეგორია:</p> <p> ' . $categories . ' </p></div><div data-titlecontainer="' . $row['id'] . '" class="small-section"> <span class="span" data-titlecontainer="' . $row['id'] . '">ლოკაცია:</span><p> ' . $locations . ' </p> </span></div>
                    </div>
                    <i class="fa-solid fa-caret-down plus-icon " id="icon-' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '"></i>
                </div>
                <div class="description" id="' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '">
                    <p>
                    ' . $description . '
                    </p>
                    <br />
                    <a
                    class="seeMorelink"
                    target="_blank"
                    href="' . $row['link'] . '"
                    alt="დეტალურად ნახვა"
                    >დეტალურად</a>
                </div>
        </div> ';
            }
        } else {
            echo '<h3>ინფორმაცია ვერ მოიძებნა...</h3>';
        }
    } else     if (isset($_GET['beneficiaries'])) {
        $searchValue = filter_input(INPUT_GET, 'beneficiaries', FILTER_SANITIZE_SPECIAL_CHARS);
        $searchQuery = "SELECT * FROM SocialServiceTable WHERE beneficiaries LIKE '%$searchValue%'  OR locations LIKE '%$searchValue%'";
        // echo $searchValue;
        $queryRun = mysqli_query($conn, $searchQuery);
        if (mysqli_num_rows($queryRun) > 0) {
            while ($row = mysqli_fetch_assoc($queryRun)) {

                $title = $row['title'];
                $description = $row['service_description'];
                $categories = $row['categories'];
                $locations = $row['locations'];
                $locations = $row['region'];
                $beneficiaries = $row['beneficiaries'];

                // Highlight the searched words in the title
                $locations = highlightSearchedWords($locations, $searchValue);
                // Render the posts as before
                echo ' <div class="container-info" data-titlecontainer="' . $row['id'] . '">
                <div class="title" data-titlecontainer="' . $row['id'] . '">
                    <div class="main-info" data-titlecontainer="' . $row['id'] . '">
                    <p class="title-text" data-titlecontainer="' . $row['id'] . '"> ' . $title . ' </p>
                    <span class="more-info" data-titlecontainer="' . $row['id'] . '"><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">ბენეფიციარები:</p><p> ' . $beneficiaries . ' </p> </div><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">კატეგორია:</p> <p> ' . $categories . ' </p></div><div data-titlecontainer="' . $row['id'] . '" class="small-section"> <span class="span" data-titlecontainer="' . $row['id'] . '">ლოკაცია:</span><p> ' . $locations . ' </p> </span></div>
                    </div>
                    <i class="fa-solid fa-caret-down plus-icon " id="icon-' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '"></i>
                </div>
                <div class="description" id="' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '">
                    <p>
                    ' . $description . '
                    </p>
                    <br />
                    <a
                    class="seeMorelink"
                    target="_blank"
                    href="' . $row['link'] . '"
                    alt="დეტალურად ნახვა"
                    >დეტალურად</a>
                </div>
        </div> ';
            }
        } else {
            echo '<h3>ინფორმაცია ვერ მოიძებნა...</h3>';
        }
    } else if (isset($_GET['searchBar']) && !empty($_GET['searchBar'])) {
        $searchValue = htmlspecialchars($_GET['searchBar']);
        $searchQuery = "SELECT * FROM SocialServiceTable WHERE title LIKE '%$searchValue%' OR locations LIKE '%$searchValue%' OR region LIKE '%$searchValue%' OR beneficiaries LIKE '%$searchValue%' OR categories LIKE '%$searchValue%'";
        // echo $searchValue;
        $queryRun = mysqli_query($conn, $searchQuery);
        if (mysqli_num_rows($queryRun) > 0) {
            while ($row = mysqli_fetch_assoc($queryRun)) {

                $title = $row['title'];
                $description = $row['service_description'];
                $categories = $row['categories'];
                $locations = $row['locations'];
                $locations = $row['region'];
                $beneficiaries = $row['beneficiaries'];

                // Highlight the searched words in the title
                $title = highlightSearchedWords($title, $_GET['searchBar']);
                $description = highlightSearchedWords($description, $_GET['searchBar']);
                $categories = highlightSearchedWords($categories, $_GET['searchBar']);
                $locations = highlightSearchedWords($locations, $_GET['searchBar']);
                $beneficiaries = highlightSearchedWords($beneficiaries, $_GET['searchBar']);

                // Render the posts as before
                echo ' <div class="container-info" data-titlecontainer="' . $row['id'] . '">
                <div class="title" data-titlecontainer="' . $row['id'] . '">
                    <div class="main-info" data-titlecontainer="' . $row['id'] . '">
                    <p class="title-text" data-titlecontainer="' . $row['id'] . '"> ' . $title . ' </p>
                    <span class="more-info" data-titlecontainer="' . $row['id'] . '"><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">ბენეფიციარები:</p><p> ' . $beneficiaries . ' </p> </div><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">კატეგორია:</p> <p> ' . $categories . ' </p></div><div data-titlecontainer="' . $row['id'] . '" class="small-section"> <span class="span" data-titlecontainer="' . $row['id'] . '">ლოკაცია:</span><p> ' . $locations . ' </p> </span></div>
                    </div>
                    <i class="fa-solid fa-caret-down plus-icon " id="icon-' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '"></i>
                </div>
                <div class="description" id="' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '">
                    <p>
                    ' . $description . '
                    </p>
                    <br />
                    <a
                    class="seeMorelink"
                    target="_blank"
                    href="' . $row['link'] . '"
                    alt="დეტალურად ნახვა"
                    >დეტალურად</a>
                </div>
        </div> ';
            }
        } else {
            echo '<h3>ინფორმაცია ვერ მოიძებნა...</h3>';
        }
    } elseif (isset($_GET['filterCat']) || isset($_GET['filterLoc']) || isset($_GET['filterBen'])) {
        $filterCat = isset($_GET['filterCat']) ? $_GET['filterCat'] : array();
        $filterLoc = isset($_GET['filterLoc']) ? $_GET['filterLoc'] : array();
        $filterBen = isset($_GET['filterBen']) ? $_GET['filterBen'] : array();

        $filterQuery = "SELECT * FROM SocialServiceTable WHERE 1=1";

        if (!empty($filterCat)) {
            $filterQuery .= " AND (";
            $orConditions = array();
            foreach ($filterCat as $value) {
                $orConditions[] = "categories LIKE '%" . $value . "%'";
            }
            $filterQuery .= implode(" OR ", $orConditions);
            $filterQuery .= ")";
        }

        if (!empty($filterLoc)) {
            $filterQuery .= " AND (";
            $orConditions = array();
            foreach ($filterLoc as $value) {
                $orConditions[] = "region LIKE '%" . $value . "%'";
            }
            $filterQuery .= implode(" OR ", $orConditions);
            $filterQuery .= ")";
        }

        if (!empty($filterBen)) {
            $filterQuery .= " AND (";
            $orConditions = array();
            foreach ($filterBen as $value) {
                $orConditions[] = "beneficiaries LIKE '%" . $value . "%'";
            }
            $filterQuery .= implode(" OR ", $orConditions);
            $filterQuery .= ")";
        }

        renderPostsIf($conn, $filterQuery);
    } else {
        renderPostsElse($conn);
    }
}

function renderPostsIf($conn, $filterQuery)
{
    $queryRun = mysqli_query($conn, $filterQuery);
    if (mysqli_num_rows($queryRun) > 0) {
        while ($row = mysqli_fetch_assoc($queryRun)) {
            // Render the posts as before
            echo ' <div class="container-info" data-titlecontainer="' . $row['id'] . '">
            <div class="title" data-titlecontainer="' . $row['id'] . '">
                <div class="main-info" data-titlecontainer="' . $row['id'] . '">
                <p class="title-text" data-titlecontainer="' . $row['id'] . '"> ' . $row['title'] . ' </p>
                <span class="more-info" data-titlecontainer="' . $row['id'] . '"><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">ბენეფიციარები:</p> ' . $row['beneficiaries'] . ' </div><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">კატეგორია:</p> ' . $row['categories'] . ' </div><div data-titlecontainer="' . $row['id'] . '" class="small-section"> <span class="span" data-titlecontainer="' . $row['id'] . '">ლოკაცია:</span> ' . $row['region'] . ' </span></div>
                </div>
                <i class="fa-solid fa-caret-down plus-icon " id="icon-' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '"></i>
            </div>
            <div class="description" id="' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '">
                <p>
                ' . $row['service_description'] . '
                </p>
                <br />
                <a
                class="seeMorelink"
                target="_blank"
                href="' . $row['link'] . '"
                alt="დეტალურად ნახვა"
                >დეტალურად</a>
            </div>
    </div> ';
        }
    } else {
        echo 'ინფორმაცია ვერ მოიძებნა';
    }
}

function renderPostsElse($conn)
{
    $products = "SELECT * FROM SocialServiceTable ORDER BY id DESC"; //ORDER BY title ASC   === code for ordering by title
    $queryRun = mysqli_query($conn, $products);
    if (mysqli_num_rows($queryRun) > 0) {
        while ($row = mysqli_fetch_assoc($queryRun)) {
            echo '
     <div class="container-info" data-titlecontainer="' . $row['id'] . '">
             <div class="title" data-titlecontainer="' . $row['id'] . '">
                 <div class="main-info" data-titlecontainer="' . $row['id'] . '">
                 <p class="title-text" data-titlecontainer="' . $row['id'] . '"> ' . $row['title'] . ' </p>
                 <span class="more-info" data-titlecontainer="' . $row['id'] . '"><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">ბენეფიციარები:</p> ' . $row['beneficiaries'] . ' </div><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">კატეგორია:</p> ' . $row['categories'] . ' </div><div data-titlecontainer="' . $row['id'] . '" class="small-section"> <span class="span" data-titlecontainer="' . $row['id'] . '">ლოკაცია:</span> ' . $row['region'] . ' </span></div>
                 </div>
                 <i class="fa-solid fa-caret-down plus-icon " id="icon-' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '"></i>
             </div>
             <div class="description" id="' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '">
                 <p>
                 ' . $row['service_description'] . '
                 </p>
                 <br />
                 <div class="buttons-cont">
                 <button class="fb-button" data-postid="' . $row['id'] . '"><i class="fa-brands fa-facebook fa-2xl"></i></button>
                 <a
                 class="seeMorelink"
                 target="_blank"
                 href="' . $row['link'] . '"
                 alt="დეტალურად ნახვა"
                 >დეტალურად</a>
                 </div>
             </div>
     </div> ';
        }
    }
}

function highlightSearchedWords($text, $searchText)
{

    //  ===================   VERSION 2 FOR HIGHLIGHTING   START================== //
    $searchValue = strtolower($searchText);

    $searchValue = preg_quote($searchText);

    $pattern = '/(' . $searchValue . ')/iu';
    $highlightedText = preg_replace($pattern, '<span class="highlight">$1</span>', $text);

    return $highlightedText;
    //  ===================   VERSION 2 FOR HIGHLIGHTING   END ================== //
    //  ===================   VERSION 1 FOR HIGHLIGHTING   START================== //

    // $wordsArray = explode(" ", $searchText);
    // $wordsCount = count($wordsArray);

    // for ($i = 0; $i < $wordsCount; $i++) {
    //     $highlighted_text = "<span class='highlight'>$wordsArray[$i]</span>";
    //     $text = str_ireplace($wordsArray[$i], $highlighted_text, $text);
    // }

    // return $text;
    //  ===================   VERSION 1 FOR HIGHLIGHTING   END ================== //

}

// style='font-weight:bold;background-color: #F9F902;







// function highlightSearchedWords($text, $searchText)
// {
//     // Split the search text into individual words
//     $searchWords = explode(' ', $searchText);

//     // Iterate through each word and highlight it in the text
//     foreach ($searchWords as $word) {
//         $text = preg_replace("/($word)/i", ' <span class="highlight">$1</span> ', $text);
//     }

//     return $text;
// }









// TEXT WITHOUT ECHO

/*
<div class="container-info" data-titlecontainer="<?= $row['id'] ?> ">
                    <div class="title" data-titlecontainer="<?= $row['id'] ?> ">
                        <div class="main-info" data-titlecontainer="<?= $row['id'] ?> ">
                            <p class="title-text" data-titlecontainer="<?= $row['id'] ?> "><?= $title ?></p>
                            <span class="more-info" data-titlecontainer="<?= $row['id'] ?> ">
                                <div class="small-section" data-titlecontainer="<?= $row['id'] ?> ">
                                    <p class="span" data-titlecontainer="<?= $row['id'] ?> ">ბენეფიციარები:</p> <?= $beneficiaries ?>
                                </div>
                                <div class="small-section" data-titlecontainer="<?= $row['id'] ?> ">
                                    <p class="span" data-titlecontainer="<?= $row['id'] ?> ">კატეგორია:</p> <?= $categories ?>
                                </div>
                                <div data-titlecontainer="<?= $row['id'] ?> " class="small-section"> <span class="span" data-titlecontainer="<?= $row['id'] ?> ">ლოკაცია:</span> <?= $locations ?>
                            </span>
                        </div>
                    </div>
                    <i class="fa-solid fa-caret-down plus-icon " id="icon-<?= $row['id'] ?> " data-titlecontainer="<?= $row['id'] ?>"></i>
                </div>
                <div class="description" id="<?= $row['id'] ?> " data-titlecontainer="<?= $row['id'] ?> ">
                    <p>
                        <?= $description ?>
                    </p>
                    <br />
                    <a class="seeMorelink" target="_blank" href="<?= $row['link'] ?>" alt="დეტალურად ნახვა">დეტალურად</a>
                </div>
                </div>
*/
