<?php
include 'config.php';
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


function getMainPosts($conn)
{
    if (isset($_GET['filterCat']) || isset($_GET['filterLoc']) || isset($_GET['filterBen'])) {
        if (isset($_GET['filterCat'])) {
            $filterChecked = [];
            $filterChecked = $_GET['filterCat'];
            $columnName = 'categories';
            echo "jaba";
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
        $queryRun = sqlsrv_query($conn, $filterQuery);
        if (sqlsrv_has_rows($queryRun)) {
            while ($row = sqlsrv_fetch_array($queryRun, SQLSRV_FETCH_ASSOC)) {
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
    $queryRun = sqlsrv_query($conn, $products);
    if (sqlsrv_has_rows($queryRun)) {
        while ($row = sqlsrv_fetch_array($queryRun, SQLSRV_FETCH_ASSOC)) {
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
