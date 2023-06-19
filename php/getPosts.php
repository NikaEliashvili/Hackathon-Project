<?php
/*
include 'config.php';
// Check the connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}


function getMainPosts($conn)
{
    if (isset($_GET['filterCat']) || isset($_GET['filterLoc']) || isset($_GET['filterBen'])) {
        if (isset($_GET['filterCat'])) {
            $filterChecked = [];
            $filterChecked = $_GET['filterCat'];
            $columnName = 'categories';
            renderPostsIf($conn, $columnName, $filterChecked);
        }
        if (isset($_GET['filterLoc'])) {
            $filterChecked = [];
            $filterChecked = $_GET['filterLoc'];
            $columnName = 'region';
            renderPostsIf($conn, $columnName, $filterChecked);
        }
        if (isset($_GET['filterBen'])) {
            $filterChecked = [];
            $filterChecked = $_GET['filterBen'];
            $columnName = 'beneficiaries';
            renderPostsIf($conn, $columnName, $filterChecked);
        }
    } else {
        renderPostsElse($conn);
    }
}


function renderPostsIf($conn, $columnName, $filterChecked)
{
    foreach ($filterChecked as $filterValue) {
        // echo $filterValue;
        $filterQuery = "SELECT * FROM SocialServiceTable WHERE $columnName COLLATE Georgian_Modern_Sort_CI_AI LIKE N'%" . $filterValue . "%'";
        $queryRun = mysqli_query($conn, $filterQuery);
        if (mysqli_num_rows($queryRun) > 0) {
            while ($row = mysqli_fetch_assoc($queryRun)) {
                echo '
                <div class="container-info" data-titlecontainer="' . $row['id'] . '">
                        <div class="title" data-titlecontainer="' . $row['id'] . '">
                            <div class="main-info" data-titlecontainer="' . $row['id'] . '">
                            <p class="title-text" data-titlecontainer="' . $row['id'] . '">' . $row['title'] . '</p>
                            <span class="more-info" data-titlecontainer="' . $row['id'] . '"><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">კატეგორია:</p> ' . $row['categories'] . '</div><div data-titlecontainer="' . $row['id'] . '" class="small-section"> <span class="span" data-titlecontainer="' . $row['id'] . '">ლოკაცია:</span> ' . $row['region'] . '</span></div>
                            </div>
                            <i class="fa-solid fa-circle-plus plus-icon " id="icon-' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '"></i>
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
                </div>';
            }
        }
    }
}

function renderPostsElse($conn)
{
    $products = "SELECT * FROM SocialServiceTable";
    $queryRun = mysqli_query($conn, $products);
    if (mysqli_num_rows($queryRun) > 0) {
        while ($row = mysqli_fetch_assoc($queryRun)) {
            echo '
     <div class="container-info" data-titlecontainer="' . $row['id'] . '">
             <div class="title" data-titlecontainer="' . $row['id'] . '">
                 <div class="main-info" data-titlecontainer="' . $row['id'] . '">
                 <p class="title-text" data-titlecontainer="' . $row['id'] . '">' . $row['title'] . '</p>
                 <span class="more-info" data-titlecontainer="' . $row['id'] . '"><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">კატეგორია:</p> ' . $row['categories'] . '</div><div data-titlecontainer="' . $row['id'] . '" class="small-section"> <span class="span" data-titlecontainer="' . $row['id'] . '">ლოკაცია:</span> ' . $row['region'] . '</span></div>
                 </div>
                 <i class="fa-solid fa-circle-plus plus-icon " id="icon-' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '"></i>
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
     </div>';
        }
    }
}



IS FINISING HERE
*/

include 'config.php';

// Check the connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error($conn));
}

function getMainPosts($conn)
{
    if (isset($_GET['filterCat']) || isset($_GET['filterLoc']) || isset($_GET['filterBen'])) {
        if (isset($_GET['filterCat'])) {
            $filterChecked = [];
            $filterChecked = $_GET['filterCat'];
            $columnName = 'categories';
            renderPostsIf($conn, $columnName, $filterChecked);
        }
        if (isset($_GET['filterLoc'])) {
            $filterChecked = [];
            $filterChecked = $_GET['filterLoc'];
            $columnName = 'region';
            renderPostsIf($conn, $columnName, $filterChecked);
        }
        if (isset($_GET['filterBen'])) {
            $filterChecked = [];
            $filterChecked = $_GET['filterBen'];
            $columnName = 'beneficiaries';
            renderPostsIf($conn, $columnName, $filterChecked);
        }
    } else {
        renderPostsElse($conn);
    }
}

function renderPostsIf($conn, $columnName, $filterChecked)
{
    foreach ($filterChecked as $filterValue) {
        $filterQuery = "SELECT * FROM SocialServiceTable WHERE $columnName LIKE '%" . $filterValue . "%'";
        $queryRun = mysqli_query($conn, $filterQuery);
        if (mysqli_num_rows($queryRun) > 0) {
            while ($row = mysqli_fetch_assoc($queryRun)) {
                echo '
                <div class="container-info" data-titlecontainer="' . $row['id'] . '">
                        <div class="title" data-titlecontainer="' . $row['id'] . '">
                            <div class="main-info" data-titlecontainer="' . $row['id'] . '">
                            <p class="title-text" data-titlecontainer="' . $row['id'] . '">' . $row['title'] . '</p>
                            <span class="more-info" data-titlecontainer="' . $row['id'] . '"><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">კატეგორია:</p> ' . $row['categories'] . '</div><div data-titlecontainer="' . $row['id'] . '" class="small-section"> <span class="span" data-titlecontainer="' . $row['id'] . '">ლოკაცია:</span> ' . $row['region'] . '</span></div>
                            </div>
                            <i class="fa-solid fa-circle-plus plus-icon " id="icon-' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '"></i>
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
                </div>';
            }
        }
    }
}

function renderPostsElse($conn)
{
    $products = "SELECT * FROM SocialServiceTable";
    $queryRun = mysqli_query($conn, $products);
    if (mysqli_num_rows($queryRun) > 0) {
        while ($row = mysqli_fetch_assoc($queryRun)) {
            echo '
     <div class="container-info" data-titlecontainer="' . $row['id'] . '">
             <div class="title" data-titlecontainer="' . $row['id'] . '">
                 <div class="main-info" data-titlecontainer="' . $row['id'] . '">
                 <p class="title-text" data-titlecontainer="' . $row['id'] . '">' . $row['title'] . '</p>
                 <span class="more-info" data-titlecontainer="' . $row['id'] . '"><div class="small-section" data-titlecontainer="' . $row['id'] . '"><p class="span" data-titlecontainer="' . $row['id'] . '">კატეგორია:</p> ' . $row['categories'] . '</div><div data-titlecontainer="' . $row['id'] . '" class="small-section"> <span class="span" data-titlecontainer="' . $row['id'] . '">ლოკაცია:</span> ' . $row['region'] . '</span></div>
                 </div>
                 <i class="fa-solid fa-circle-plus plus-icon " id="icon-' . $row['id'] . '" data-titlecontainer="' . $row['id'] . '"></i>
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
     </div>';
        }
    }
}
